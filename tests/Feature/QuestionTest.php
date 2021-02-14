<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test listing various elements
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->getJson('/api/questions');

        $response
            ->assertStatus(200);
    }

    /**
     * Test listing one element
     *
     * @return void
     */
    public function test_show()
    {
        $response = $this->getJson('/api/questions/1');

        $response
            ->assertStatus(200);
    }

    /**
     * Test creation
     *
     * @return void
     */
    public function test_store()
    {
        $response = $this->postJson('/api/questions', [
            "title"=> "Pregunta Test 3",
            "description"=> "Esto es una descripcion de test pregunta 3"
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created_at' => true,
            ]);
    }

    /**
     * Test update
     *
     * @return void
     */
    public function test_update()
    {
        $response = $this->putJson('/api/questions/1', [
            "title"=> "Pregunta test 32",
            "description"=> "Esto es una descripcion de test pregunta 3"
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created_at' => true,
            ]);
    }

}
