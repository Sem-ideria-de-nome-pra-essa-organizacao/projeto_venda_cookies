<?php

namespace Tests\Feature;

use App\Models\Baker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BakerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method of a controller.
     */
    public function test_controller_index_returns_successful_response(): void
    {
        $response = $this->get('/bakers');

        $response->assertStatus(200);
    }

    /**
     * Test the store method of a controller.
     */
    public function test_controller_store_creates_resource(): void
    {
        $response = $this->post('/bakers/store/', [
            'name' => 'Test',
            'email' => 'teste@teste.com',
            'age' => 18,
            'role' => 'baker',
            'experience' => 5,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('bakers', [
            'name' => 'Test',
            'email' => 'teste@teste.com',
        ]);
    }

    /**
     * Test the update method of a controller.
     */
    public function test_controller_update_modifies_resource(): void
    {
        // Cria um registro para atualizar
        $baker = Baker::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@email.com',
            'age' => 18,
            'role' => 'baker',
            'experience' => 5,
        ]);

        $response = $this->put("/bakers/update/{$baker->id}", [
            'name' => 'Updated Name',
            'email' => 'updated@email.com',
            'age' => 18,
            'role' => 'baker',
            'experience' => 5,
        ]);

        $response->assertStatus(302); // Verifica se a atualização foi bem-sucedida
        $this->assertDatabaseHas('bakers', [
            'id' => $baker->id,
            'name' => 'Updated Name',
            'email' => 'updated@email.com',
        ]);
    }

    /**
     * Test the destroy method of a controller.
     */
    public function test_controller_destroy_deletes_resource(): void
    {
        // Cria um registro para deletar
        $baker = Baker::factory()->create();

        $response = $this->delete("/bakers/{$baker->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('bakers', [
            'id' => $baker->id,
        ]);
    }
}
