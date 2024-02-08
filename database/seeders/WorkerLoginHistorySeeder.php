<?php

namespace Database\Seeders;

use App\Models\Worker;
use App\Models\WorkerLoginHistory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WorkerLoginHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $worker = Worker::orderBy('name', 'ASC')->limit(10)->get()->pluck('id')->toArray();
        foreach (range(1,200) as $index) {
            $randomTimeStamp = Carbon::now()->subDays(rand(0, 6))->subWeeks(rand(0, 2))->subMinutes(random_int(0, 55));
            WorkerLoginHistory::create([
                'worker_id' => $worker[rand(0, count($worker)-1)],
                'created_at' => $randomTimeStamp,
                'updated_at' => $randomTimeStamp,
            ]);
        }
    }
}
