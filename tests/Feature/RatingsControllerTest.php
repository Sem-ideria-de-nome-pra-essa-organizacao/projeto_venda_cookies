<?php

namespace Tests\Feature;

use App\Models\Ratings;
use App\Models\User;
use App\Models\Biscuit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method of a controller.
     */
    public function test_controller_index_returns_successful_response(): void
    {
        $response = $this->get('/ratings');

        $response->assertStatus(200);
    }

    /**
     * Test the store method of a controller.
     */
    public function test_controller_store_creates_resource(): void
    {
        $biscuit = Biscuit::factory()->create();

        $response = $this->post('/ratings/store/', [
            'name' =>"Teste",
            'biscuit_id' => $biscuit->id,
            'rating' => 5,
            'comment' => 'Excellent biscuit!',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('ratings', [
            'name' =>"Teste",
            'biscuit_id' => $biscuit->id,
            'rating' => 5,
        ]);
    }

    /**
     * Test the update method of a controller.
     */
    public function test_controller_update_modifies_resource(): void
    {
        $rating = Ratings::factory()->create();

        $response = $this->put("/ratings/update/{$rating->id}", [
            'rating' => 4,
            'comment' => 'Updated comment',
            'biscuit_id' => $rating->biscuit_id,
            'name' =>"Teste",


        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('ratings', [
            'id' => $rating->id,
            'rating' => 4,
            'comment' => 'Updated comment',
        ]);
    }

    /**
     * Test the destroy method of a controller.
     */
    public function test_controller_destroy_deletes_resource(): void
    {
        $rating = Ratings::factory()->create();

        $response = $this->delete("/ratings/{$rating->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('ratings', [
            'id' => $rating->id,
        ]);
    }
}
