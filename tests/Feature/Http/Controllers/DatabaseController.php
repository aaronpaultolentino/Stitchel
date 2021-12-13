<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test *
     * @group database *
     */
    public function is_database_exist()
    {
        $response = $this->assertDatabaseHas('users', [
            'email' => 'test1@example.com'
        ]);

        $response->assertStatus(200);

    }
}
