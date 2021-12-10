<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegrationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test *
     * @group integration *
     */
    public function is_integration_gmail_add()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
