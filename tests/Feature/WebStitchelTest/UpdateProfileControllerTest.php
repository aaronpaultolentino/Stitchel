<?php

namespace Tests\Feature\WeStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProfileControllerTest extends TestCase
{
    use WithFaker;


    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group userUpdate *
     */
    public function user_can_view_update_profile()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, 'web')->get('/profile')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function user_cannot_view_update_profile()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/profile')
            ->assertStatus(404);
    }

      /**
     * A basic feature RequiredMoileNumber test.
     *
     * @test *
     * @group userUpdate *
     */
      public function mobile_number_is_required()
    {

        $user = factory(User::class)->make(['mobile_number' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('mobile_number'));
    }

     /**
     * A basic feature RequiredAddress test.
     *
     * @test *
     * @group userUpdate *
     */
      public function address_is_required()
    {

        $user = factory(User::class)->make(['address' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('address'));
    }

     /**
     * A basic feature RequiredPostcode test.
     *
     * @test *
     * @group userUpdate *
     */
      public function postcode_is_required()
    {

        $user = factory(User::class)->make(['postcode' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('postcode'));
    }

     /**
     * A basic feature RequiredArea test.
     *
     * @test *
     * @group userUpdate *
     */
      public function area_is_required()
    {

        $user = factory(User::class)->make(['area' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('area'));
    }

    /**
     * A basic feature RequiredCountry test.
     *
     * @test *
     * @group userUpdate *
     */
      public function country_is_required()
    {

        $user = factory(User::class)->make(['country' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('country'));
    }

     /**
     * A basic feature RequiredState test.
     *
     * @test *
     * @group userUpdate *
     */
      public function state_is_required()
    {

        $user = factory(User::class)->make(['state' => null,]);

        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('state'));
    }

    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group userUpdate *
     */
    public function user_can_update_profile()
    {
    
        $user = factory(User::class)->make();

        $this->assertTrue($user->save());
        $this->actingAs($user, 'web')->post('/profile/profile', $user->toArray());
    }
}
