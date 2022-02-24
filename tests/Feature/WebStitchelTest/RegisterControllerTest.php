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

        $user = factory(User::class)->make([
          'name' => null,
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

        $user = factory(User::class)->make([
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

        $user = factory(User::class)->make([
          'password' => null,
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

        $user = factory(User::class)->make([
          'password_confirmation' => null,
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

       $user = factory(User::class)->make();

      $this->assertTrue($user->save());

      $response = $this->post('/register', $user->toArray());
    }
}
