<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
			'name' => $this->faker->unique()->word(2, true),
			'price' => $this->faker->numberBetween( 1, 10000),
			'description' => $this->faker->sentence(),
			'active' => $this->faker->boolean(),
		];
	}
}
