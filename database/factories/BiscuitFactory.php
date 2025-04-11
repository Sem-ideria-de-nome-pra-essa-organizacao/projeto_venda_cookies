<?php

namespace Database\Factories;

use App\Models\Baker;
use App\Models\Biscuit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BiscuitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =Biscuit::class;

    public function definition(): array
    {
        return [
        'name' => $this->faker->unique()->word(),
        'flavor' => $this->faker->randomElement(['chocolate', 'vanilla', 'strawberry', 'lemon']),
        'shape' => $this->faker->randomElement(['round', 'square', 'star']),
        'size' => $this->faker->randomElement(['small', 'medium', 'large']),
        'description' => $this->faker->text(100),
        'price' => $this->faker->randomFloat(2, 1, 20),
        'baker_id' => Baker::factory(),
        ];
    }
}
