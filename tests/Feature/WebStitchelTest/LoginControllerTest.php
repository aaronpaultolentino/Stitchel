<?php

namespace Tests\Feature\WebStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group login *
     */
    public function user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * A basic feature RequiredEmailForLogin test.
     *
     * @test *
     * @group login *
     */
      public function login_email_is_required()
    {

        $user = factory(User::class)->make([
          'email' => null,
      ]);

        $response = $this->post('/login', $user->toArray())->assertSessionHasErrors(('email'));
    }

    /**
     * A basic feature RequiredPasswordForLogin test.
     *
     * @test *
     * @group login *
     */
      public function login_password_is_required()
    {

        $user = factory(User::class)->make([
          'password' => null,
      ]);

        $response = $this->post('/login', $user->toArray())->assertSessionHasErrors(('password'));
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
            'email' => 'test@gmail.com',
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
