<?php

namespace Tests\Feature\WebStitchelTest;

use App\User;
use Tests\TestCase;
use App\Integrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stitchel\Services\SearchProviders\Providers\Jira;
use Stitchel\Services\SearchProviders\Providers\Slack;
use Stitchel\Services\SearchProviders\Providers\Gmail;

class IntegrationControllerTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_integration_index_gmail()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/integrations')
            ->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_add_integration_gmail_data()
    {   
        $user = factory(User::class)->create();

         $data = [
            'user_id' => $user->id,
            'type' => "gmail",
            'data' => "Gmail Data Test"
        ];

        $integration = Integrations::create([
            'user_id' => $data['user_id'],
            'type' => $data['type'],
            'data' => $data['data'],
        ]);

        $this->actingAs($user);
        $this->expectNotToPerformAssertions();
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_get_integration_gmail_data()
    {   
        $user = factory(User::class)->create();

        $integrations = Integrations::whereType('gmail')->get();

        $this->actingAs($user);
        $this->expectNotToPerformAssertions();

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_integration_index_jira()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/integrations')
            ->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_integration_index_slack()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/integrations')
            ->assertStatus(200);
    }
}
