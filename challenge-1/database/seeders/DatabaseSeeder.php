<?php

namespace Database\Seeders;

use App\Models\Attendence;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Shift;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Location::factory()
            ->count(3)
            ->create();

        Shift::insert([
            'start_time' => '06:00',
            'end_time' => '15:00',
        ],[
            'start_time' => '15:00',
            'end_time' => '23:00',
        ]);

        Employee::factory()
            ->has( Schedule::factory()->count(1) )
            ->has( Attendence::factory()->count(1) )
            ->count(50)
            ->create();
    }
}
