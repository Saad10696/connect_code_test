<?php

namespace Database\Seeders;

use App\Models\Attendence;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Shift;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use function GuzzleHttp\Promise\each;

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
            ->count(50)
            ->create();

        $date = Carbon::now();
        $employees = Employee::all();
        foreach ( $employees as $key => $value) {

            for ($i=0; $i < 30; $i++) { 

                $date = $date->subDays(1);

                $checkin = [ 
                    $date->format('Y-m-d') . " 06:00:00",
                    $date->format('Y-m-d') . " 08:00:00",
                ];
        
                $checkout = [ 
                    $date->format('Y-m-d') . " 12:00:00",
                    $date->format('Y-m-d') . " 16:00:00",
                ];
    
                Attendence::create([
                    'employee_id' => $value['id'],
                    'date' => $date->format('Y-m-d'),
                    'checkin_at' => fake()->dateTimeBetween($checkin[0], $checkin[1]),
                    'checkout_at' => fake()->dateTimeBetween($checkout[0], $checkout[1]),
                ]);

            }

        }
    }
}
