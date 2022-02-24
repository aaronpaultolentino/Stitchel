<?php

namespace Tests\Feature\WebStitchelTest;

use App\User;
use Tests\TestCase;
use App\Integrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stitchel\Services\SearchProviders\Providers\MobileJira;
use Stitchel\Services\SearchProviders\Providers\MobileSlack;
use Stitchel\Services\SearchProviders\Providers\MobileGmail;

class ApiIntegrationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function api_integration_index_gmail()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->get('/integrations')
            ->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_add_integration_gmail_data()
    {   
        $user = factory(User::class)->create();
        $gmailIntegration = factory(Integrations::class)->create([
            'type' => 'gmail',
        ]);
        
        $this->actingAs($user, 'api');
        $this->assertTrue($gmailIntegration->save());
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_get_integration_gmail_data()
    {   
        $user = factory(User::class)->create();
        $gmailIntegration = factory(Integrations::class)->create([
            'type' => 'gmail',
        ]);

        $gmailIntegration = Integrations::whereType('gmail')->get();

        $this->actingAs($user, 'api');
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_user_can_delete_integration_gmail_data()
    {   
        $user = factory(User::class)->create();
        $Integration = factory(Integrations::class)->create();

        $this->actingAs($user, 'api');

        $gmailintegration = Integrations::first();

        $this->delete('api/v1/integrations/delete/'. $gmailintegration->id);
        $this->assertCount(0, Integrations::all());
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function api_integration_index_jira()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->get('/integrations')
            ->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_add_integration_jira_data()
    {   
        $user = factory(User::class)->create();
        $jiraIntegration = factory(Integrations::class)->create([
            'type' => 'jira',
        ]);
        
        $this->actingAs($user, 'api');
        $this->assertTrue($jiraIntegration->save());
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_get_integration_jira_data()
    {   
        $user = factory(User::class)->create();
        $jiraIntegration = factory(Integrations::class)->create([
            'type' => 'jira',
        ]);

        $jiraIntegration = Integrations::whereType('jira')->get();

        $this->actingAs($user, 'api');
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_user_can_delete_integration_jira_data()
    {   
        $user = factory(User::class)->create();
        $Integration = factory(Integrations::class)->create();

        $this->actingAs($user, 'api');

        $jiraintegration = Integrations::first();

        $this->delete('api/v1/integrations/delete/'. $jiraintegration->id);
        $this->assertCount(0, Integrations::all());
    }

    /**
     * A basic feature test example.
     *
     * @test *
     * @group integrations *
     */
    public function api_integration_index_slack()
    {   

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->get('/integrations')
            ->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_add_integration_slack_data()
    {   
        $user = factory(User::class)->create();
        $slackIntegration = factory(Integrations::class)->create([
            'type' => 'slack',
        ]);
        
        $this->actingAs($user, 'api');
        $this->assertTrue($slackIntegration->save());
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_get_integration_slack_data()
    {   
        $user = factory(User::class)->create();
        $slackIntegration = factory(Integrations::class)->create([
            'type' => 'slack',
        ]);

        $slackIntegration = Integrations::whereType('slack')->get();

        $this->actingAs($user, 'api');
        $this->assertCount(1, Integrations::all());

    }

     /**
     * A basic feature test example.
     *
     * @test *
     * @group apiintegrations *
     */
    public function api_user_can_delete_integration_slack_data()
    {   
        $user = factory(User::class)->create();
        $Integration = factory(Integrations::class)->create();

        $this->actingAs($user, 'api');

        $slackintegration = Integrations::first();

        $this->delete('api/v1/integrations/delete/'. $slackintegration->id);
        $this->assertCount(0, Integrations::all());
    }
}
