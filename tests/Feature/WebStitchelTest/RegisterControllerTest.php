<?php

namespace Tests\Feature\WebStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterControllerTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature RequiredFieldsForRegistration test.
     *
     * @test *
     * @group register *
     */
      public function user_name_is_required()
    {
        $email = $this->faker->email;

        $user = factory(User::class)->make([
          'name' => null,
          'email' => $email
      ]);

        $response = $this->post('/register', $user->toArray())->assertSessionHasErrors(('name'));
    }

    /**
     * A basic feature RequiredFieldsForRegistration test.
     *
     * @test *
     * @group register *
     */
      public function user_email_is_required()
    {
        $name = $this->faker->name;

        $user = factory(User::class)->make([
          'name' => $name,
          'email' => null
      ]);

        $response = $this->post('/register', $user->toArray())->assertSessionHasErrors(('email'));

    }

    /**
     * A basic feature RequiredFieldsForRegistration test.
     *
     * @test *
     * @group register *
     */
      public function user_password_is_required()
    {
        $password = $this->faker->password;

        $user = factory(User::class)->make([
          'password' => null,
          'password_confirmation' => $password
      ]);

        $response = $this->post('/register', $user->toArray())->assertSessionHasErrors(('password'));

    }

     /**
     * A basic feature RequiredFieldsForRegistration test.
     *
     * @test *
     * @group register *
     */
      public function user_password_confirmation_is_required()
    {
        $password = $this->faker->password;

        $user = factory(User::class)->make([
          'password' => $password,
          'password_confirmation' => null
      ]);

        $response = $this->post('/register', $user->toArray())->assertSessionHasErrors(('password_confirmation'));

    }

    /**
     * A basic feature SuccessfulRegistration test.
     *
     * @test *
     * @group register *
     */
    public function is_successful_registration()
    {
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

          $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
          ]);

      $this->assertTrue($user->save());

      $response = $this->post('/register', $user->toArray());
    }
}
