<?php

namespace Tests\Feature\ApiStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterControllerTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature ApiRequiredFieldsForRegistration test.
     *
     * @test *
     * @group Apiregister *
     */
      public function api_user_name_is_required()
    {

        $user = factory(User::class)->make([
          'name' => null,
      ]);

        $response = $this->post('api/v1/user/signup', $user->toArray())->assertSessionHasErrors(('name'));
    }

    /**
     * A basic feature ApiRequiredFieldsForRegistration test.
     *
     * @test *
     * @group Apiregister *
     */
      public function api_user_email_is_required()
    {

        $user = factory(User::class)->make([
          'email' => null,
      ]);

        $response = $this->post('api/v1/user/signup', $user->toArray())->assertSessionHasErrors(('email'));

    }

    /**
     * A basic feature ApiRequiredFieldsForRegistration test.
     *
     * @test *
     * @group Apiregister *
     */
      public function api_user_password_is_required()
    {

        $user = factory(User::class)->make([
          'password' => null,
      ]);

        $response = $this->post('api/v1/user/signup', $user->toArray())->assertSessionHasErrors(('password'));

    }

    /**
     * A basic feature ApiRepeatPassword test.
     *
     * @test *
     * @group Apiregister *
     */
    public function api_repeat_password()
    {

        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        $user = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];

        $this->json('POST', 'api/v1/user/signup', $user, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }

    /**
     * A basic feature ApiSuccessfullRegistration test.
     *
     * @test *
     * @group Apiregister *
     */
    public function api_successful_registration()
    {

        $user = factory(User::class)->create();

        $this->post('api/v1/user/signup', $user->toArray());
        $this->expectNotToPerformAssertions();
    }
}
