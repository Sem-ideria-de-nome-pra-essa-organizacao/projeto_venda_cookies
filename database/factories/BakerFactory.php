<?php

namespace Database\Factories;

use App\Models\Baker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Baker>
 */
class BakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =Baker::class;
    public function definition(): array
    {

        $age = $this->faker->numberBetween(18, 65);
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'age' => $age,
            'role' => $this->faker->randomElement(['head baker', 'assistant baker']),
            'experience' => ($this->faker->numberBetween(1, 20) + $age) . ' years',
        ];
    }
}
