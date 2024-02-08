<?php

namespace Database\Seeders;

use App\Models\Occupation;
use App\Models\Unit;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupation = Occupation::orderBy('name', 'ASC')->get()->pluck('id')->toArray();
        $unit = Unit::orderBy('name', 'ASC')->get()->pluck('id')->toArray();
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $worker = Worker::create([
                'first_occupation_id' => $occupation[rand(0, count($occupation)-1)],
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'username' => $faker->username,
                'password' => 'password',
                'join_date' => Carbon::today()->subMonths(rand(0, 12)),
            ]);
            $worker->units()->attach([$unit[rand(0, count($unit)-1)]]);
        }
    }
}
