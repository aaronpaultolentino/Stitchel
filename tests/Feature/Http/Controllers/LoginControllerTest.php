<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature MustEnterEmailAndPassword test.
     *
     * @test *
     * @group login *
     */
     public function is_must_enter_email_and_password()
    {
        $this->json('POST', '/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group login *
     */
    public function is_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

     /**
     * A basic feature SuccessfulLogin test.
     *
     * @test *
     * @group login *
     */
    public function is_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'email' => 'test1@gmail.com',
            'password' => bcrypt($password = '123123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}