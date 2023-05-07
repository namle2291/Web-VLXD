<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tensanpham'=>fake()->name(),
            'hinhanh'=>'default.png',
            'gia'=>99999,
            'mota'=>str()->random(10)
        ];
    }
}
