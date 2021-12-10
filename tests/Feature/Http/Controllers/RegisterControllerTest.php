<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterControllerTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature RequiredFieldsForRegistration test.
     *
     * @test *
     * @group register *
     */
      public function is_required_fields_for_registration()
    {

        $response = $this->json('POST', '/register')
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);

            $response->assertStatus(422);
    }

    /**
     * A basic feature SuccessfulRegistration test.
     *
     * @test *
     * @group register *
     */
    public function is_successful_registration()
    {
         $userTest = factory(User::class)->create([
            'email' => 'test7@gmail.com',
            'password' => bcrypt($password = '123123123')
        ]);

        $response = $this->post('/login', [
            'email' => $userTest->email,
            'password' => $password,
        ]);

        $response->assertStatus(302);
    }
}
