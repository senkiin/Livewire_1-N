<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            'name'=>fake()->unique()->name(),
            'state'=>fake()->randomElement(['Pending','Completed']),
            'amount'=>random_int(0, 100),
            'image'=>'images/orders-images/'.fake()->picsum('Public/storage/images/orders-images', 650, 650, false),
            'user_id'=>User::all()->random()->id,
        ];
    }
}
