<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use App\Models\Worker;
use App\Models\Transaction;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $startDate = $request->get('start_date') ?? Carbon::today()->subMonth();
        $endDate = $request->get('end_date') ?? Carbon::today();
        $totalUnit = Unit::count();
        $totalOccupation = Occupation::count();
        if($request->get('start_date') && $request->get('end_date')) {
            $totalWorker = Worker::WhereDate('join_date', '>=', $startDate)
                                ->WhereDate('join_date', '<=', $endDate)
                                ->count();
        }else{
            $totalWorker = Worker::count();
        }
        $topWorker = Worker::withCount([
                            'login_histories' => function ($q) use ($startDate, $endDate) {
                                $q->WhereDate('join_date', '>=', $startDate)
                                    ->WhereDate('join_date', '<=', $endDate);
                            },
                        ])
                        ->having('login_histories_count', '>', 25)
                        ->orderBy('login_histories_count', 'DESC')
                        ->limit(10)
                        ->get();
        return view('worker.dashboard.index', compact('totalWorker', 'startDate', 'endDate', 'topWorker', 'totalUnit', 'totalOccupation'));
    }

    public function store(Request $request) {
        return redirect('worker/dashboard?start_date='.$request->start_date.'&end_date='.$request->end_date);
    }

}
