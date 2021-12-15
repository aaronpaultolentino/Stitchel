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
    use RefreshDatabase, WithFaker;

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
        $integration = factory(Integrations::class)->create();

        $this->actingAs($user);
        $this->assertCount(1, Integrations::all());

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
        $this->assertCount(0, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function is_user_can_delete_integration_gmail_data()
    {   
        $user = factory(User::class)->create();
        $Integration = factory(Integrations::class)->create();

        $this->actingAs($user);

        $gmailintegration = Integrations::first();

        $response = $this->delete('integrations/gmail/'. $gmailintegration->id);
        $this->assertCount(1, Integrations::all());

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
