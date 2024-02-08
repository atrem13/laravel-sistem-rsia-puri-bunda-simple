<?php

namespace App\Exports;

use App\Models\Worker;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTransaction implements FromView
{
    protected $startDate;
    protected $endDate;

    function __construct($startDate, $endDate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function view(): View
    {
        $startDate = $this->startDate;
        $endDate = $this->endDate;
        $data = Worker::with(
            [
                'transaction' => function ($q) use ($startDate, $endDate) {
                $q->where('status', 'finish')
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    // ->groupBy(DB::raw('DATE(created_at)'), 'worker_id')
                    ->select(
                        'worker_id',
                        // DB::raw('DATE(created_at) as date'),
                        DB::raw('COUNT(CASE WHEN type = "product" THEN 1 END) as count_product'),
                        DB::raw('COUNT(CASE WHEN type = "service" THEN 1 END) as count_service'),
                        DB::raw('SUM(CASE WHEN type = "product" THEN total_price ELSE 0 END) as total_price_product'),
                        DB::raw('SUM(CASE WHEN type = "service" THEN total_price ELSE 0 END) as total_price_service')
                    );
                },
            ])
            ->withCount([
                'transaction' => function ($q) use ($startDate, $endDate) {
                $q->where('status', 'finish')
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->select(DB::raw('COUNT(DISTINCT DATE(created_at))'));
                },
            ])
        ->orderBy('name', 'ASC')
        ->get();
        return view('admin.transaction.export.excel', compact('data', 'startDate', 'endDate'));
    }
}
