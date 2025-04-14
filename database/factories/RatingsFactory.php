<?php

namespace Database\Factories;

use App\Models\Biscuit;
use App\Models\Ratings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ratings>
 */
class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =Ratings::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'biscuit_id' => Biscuit::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(200),
        ];
    }
}
