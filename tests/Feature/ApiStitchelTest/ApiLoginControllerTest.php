<?php

namespace Tests\Feature\ApiStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use WithFaker;

     /**
     * A basic feature ApiRequiredEmailForLogin test.
     *
     * @test *
     * @group Apilogin *
     */
      public function api_login_email_is_required()
    {

        $user = factory(User::class)->make([
          'email' => null,
      ]);

        $response = $this->post('/login', $user->toArray())->assertSessionHasErrors(('email'));
    }

    /**
     * A basic feature ApiRequiredPasswordForLogin test.
     *
     * @test *
     * @group Apilogin *
     */
      public function api_login_password_is_required()
    {

        $user = factory(User::class)->make([
          'password' => null,
      ]);

        $response = $this->post('/login', $user->toArray())->assertSessionHasErrors(('password'));
    }

    /**
     * A basic feature ApiLoginForm test.
     *
     * @test *
     * @group Apilogin *
     */
    public function api_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * A basic feature ApiLoginForm test.
     *
     * @test *
     * @group Apilogin *
     */
    public function api_successful_login()
    {

        $email = $this->faker->email;

        $user = factory(User::class)->create([
           'email' => $email,
           'password' => bcrypt('123123123'),
        ]);


        $loginData = ['email' => $email, 'password' => '123123123'];

        $this->post('/login', $loginData);
        $this->assertAuthenticated();
    }
}
