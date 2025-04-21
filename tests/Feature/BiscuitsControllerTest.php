<?php

namespace Tests\Feature;

use App\Models\Biscuit;
use App\Models\Baker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BiscuitsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method of a controller.
     */
    public function test_controller_index_returns_successful_response(): void
    {
        $response = $this->get('/biscuits');

        $response->assertStatus(200);
    }

    /**
     * Test the store method of a controller.
     */
    public function test_controller_store_creates_resource(): void
    {

        $baker = Baker::factory()->create();
        $response = $this->post('/biscuits/store/', [
        'name' => 'Test',
        'flavor' => 'Chocolate',
        'baker_id' => $baker->id,
        'shape' => 'Round',
        'size' => 'Medium',
        'price' => 2.99,
        'description' => 'Delicious chocolate biscuit',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('biscuits', [
            'name' => 'Test',
            'flavor' => 'Chocolate',
        ]);
    }

    /**
     * Test the update method of a controller.
     */
    public function test_controller_update_modifies_resource(): void
    {
        // Cria um registro para atualizar
        $biscuit = Biscuit::factory()->create([
        ]);

        $response = $this->put("/biscuits/update/{$biscuit->id}", [
            'name' => 'Updated Name',
            'flavor' => 'Updated Flavor',
            'baker_id' => $biscuit->baker_id,
            'shape' => 'Updated Shape',
            'size' => 'Updated Size',
            'price' => 3.99,
            'description' => 'Updated description',


        ]);

        $response->assertStatus(302); // Verifica se a atualização foi bem-sucedida
        $this->assertDatabaseHas('biscuits', [
            'id' => $biscuit->id,
            'name' => 'Updated Name',
        ]);
    }

    /**
     * Test the destroy method of a controller.
     */
    public function test_controller_destroy_deletes_resource(): void
    {
        // Cria um registro para deletar
        $baker = Biscuit::factory()->create();

        $response = $this->delete("/biscuits/{$baker->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('bakers', [
            'id' => $baker->id,
        ]);
    }
}
