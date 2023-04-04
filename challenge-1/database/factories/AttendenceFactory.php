<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttendenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkin = [ 
            date('Y-m-d H:i:s', strtotime('now')), 
            date('Y-m-d H:i:s', strtotime('+2 hours', strtotime('now') ) )
        ];

        $checkout = [ 
            date('Y-m-d H:i:s', strtotime('+6 hours', strtotime('now') ) ),
            date('Y-m-d H:i:s', strtotime('+8 hours', strtotime('now') ) )
        ];

        return [
            'checkin_at' => fake()->dateTimeBetween($checkin[0], $checkin[1]),
            'checkout_at' => fake()->dateTimeBetween($checkout[0], $checkout[1]),
        ];
    }
}
