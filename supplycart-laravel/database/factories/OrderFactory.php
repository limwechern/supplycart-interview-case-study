<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Define the possible status values
        $statuses = ['To Pay', 'To Ship', 'To Receive', 'Completed', 'Cancelled', 'Return Refund'];

        return [
            'user_id' => rand(1, 2),
            'total_price' => $this->faker->randomFloat(2, 50, 500),
            'status' => $statuses[array_rand($statuses)], // Select a random status from the array
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
