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
            ->assertStatus(200)
            ->assertJsonStructure([
                            'data', 
                            'current_page',
                            'last_page',
            ]);;
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
            ->assertStatus(200)
            ->assertJsonStructure([
                    'id',
                    'title',
                    'description',
                    'user_id',
                    'user',
                    'subject',
                    'subject_id',
                    'created_at',
                    'updated_at'
            ]);
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
                "title"=> "Pregunta Test 3",
                "description"=> "Esto es una descripcion de test pregunta 3"
            ])
            ->assertJsonStructure([
                    'id',
                    'title',
                    'description',
                    'user_id',
                    'subject_id',
                    'created_at',
                    'updated_at'
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
            ])
            ->assertJsonStructure([
                    'id',
                    'title',
                    'description',
                    'user_id',
                    'subject_id',
                    'created_at',
                    'updated_at'
            ]);
    }

    /**
     * Test destroy
     *
     * @return void
     */
    public function test_destroy()
    {
        $response = $this->deleteJson('/api/questions/1', [
            "title"=> "Pregunta test 32",
            "description"=> "Esto es una descripcion de test pregunta 3"
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created_at' => true,
            ])
            ->assertJsonStructure([
                    'id',
                    'title',
                    'description',
                    'user_id',
                    'subject_id',
                    'created_at',
                    'updated_at'
            ]);
    }

}
