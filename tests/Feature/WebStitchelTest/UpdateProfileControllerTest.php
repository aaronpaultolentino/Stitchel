<?php

namespace Tests\Feature\WeStitchelTest;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group login *
     */
    public function user_can_view_edit_profile()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/profile')
            ->assertStatus(200);
    }

      /**
     * A basic feature RequiredMoileNumber test.
     *
     * @test *
     * @group login *
     */
      public function mobile_number_is_required()
    {

        $user = factory(User::class)->make(['mobile_number' => null,]);

        $this->actingAs($user)->post('/profile/profile', $user->toArray())
            ->assertSessionHasErrors(('mobile_number'));
    }

    /**
     * A basic feature LoginForm test.
     *
     * @test *
     * @group userUpdate *
     */
    public function user_can_update_profile()
    {
    
        $user = factory(User::class)->create();


        $this->actingAs($user);

    }
}
