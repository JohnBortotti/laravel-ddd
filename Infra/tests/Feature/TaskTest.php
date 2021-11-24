<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function shouldCreateTask(): void
    {
        $attributes = [
            'title' => 'task_010101010_',
            'description' => 'description_test',

        ];

        $this->json('POST', 'api/tasks', $attributes);

        $response = $this->get('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure([[
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]]);
    }
}
