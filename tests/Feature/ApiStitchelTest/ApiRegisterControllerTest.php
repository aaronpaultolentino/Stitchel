<?php

namespace Tests\Feature\ApiStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature ApiRequiredFieldsForRegistration test.
     *
     * @test *
     * @group Apiregister *
     */
      public function api_user_name_is_required()
    {
        $email = $this->faker->email;

        $user = factory(User::class)->make([
          'name' => null,
          'email' => $email
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
        $name = $this->faker->name;

        $user = factory(User::class)->make([
          'name' => $name,
          'email' => null
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
        $password = $this->faker->password;

        $user = factory(User::class)->make([
          'password' => null,
          'password_confirmation' => $password
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
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);
    }
}
