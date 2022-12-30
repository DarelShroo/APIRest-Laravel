<?php

namespace Database\Factories;

use App\Models\User\Seller;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $vendor = Seller::has('products')->get()->random();
        $comprador = User::all()->except($vendor->id)->random();

        return [
            'name' => fake()->word,
            'quantity' => fake()->numberBetween(1,3),
            'buyer_id' => $comprador -> id,
            'product_id' => $vendor -> products->random()->id
        ];
    }
}
