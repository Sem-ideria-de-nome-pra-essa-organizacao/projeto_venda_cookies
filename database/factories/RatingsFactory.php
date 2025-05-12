<?php

namespace Database\Factories;

use App\Models\Biscuit;
use App\Models\Client;
use App\Models\Ratings;

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
            'client_id' => Client::factory(),
            'biscuit_id' => Biscuit::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(200),
        ];
    }
}
