<?php

namespace Tests\Feature\ApiStitchelTest;

use App\User;
use Tests\TestCase;
use App\Integrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stitchel\Services\SearchProviders\Providers\Jira;
use Stitchel\Services\SearchProviders\Providers\Slack;
use Stitchel\Services\SearchProviders\Providers\Gmail;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

class ApiSearchControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature ApiSearch index.
     *
     * @test *
     * @group apisearch *
     */
    public function api_user_can_view_search_page()
    {   
        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->get('/')
            ->assertStatus(200);
    }

         /**
     * A basic feature ApiGmail Search.
     *
     * @test *
     * @group apisearch *
     */
    public function api_user_can_search_gmail_integration_data()
    {   
        $user = factory(User::class)->create();

        $data = json_encode(array(
                'id' => '123-123',
                'body' => 'Test Body Gmail',
                'type' => SearchProviderFactory::GMAIL,
                'url' => 'https://facebook.com',
        ));

        $gmailIntegration = factory(Integrations::class)->create([
            'type' => SearchProviderFactory::GMAIL,
        ]);

        $this->actingAs($user,'api');
        $response = $this->get('api/v1/search/'.$data);
        $response = $this->assertCount(1, Integrations::all());
    }

     /**
     * A basic feature ApiJira Search.
     *
     * @test *
     * @group apisearch *
     */
    public function api_user_can_search_jira_integration_data()
    {   
        $user = factory(User::class)->create();

        $data = json_encode(array(
                'id' => '456-456',
                'body' => 'Test Body Jira',
                'type' => SearchProviderFactory::JIRA,
                'url' => 'https://youtube.com',
        ));

        $jiraIntegration = factory(Integrations::class)->create([
            'type' => SearchProviderFactory::JIRA,
        ]);

        $this->actingAs($user,'api');
        $response = $this->post('api/v1/search/'.$data);
        $response = $this->assertCount(1, Integrations::all());
    }

    /**
     * A basic feature ApiSlack Search.
     *
     * @test *
     * @group apisearch *
     */
    public function api_user_can_search_slack_integration_data()
    {   
        $user = factory(User::class)->create();

        $data = json_encode(array(
                'id' => '321-321-321',
                'body' => 'Test Body Slack',
                'type' => SearchProviderFactory::SLACK,
                'url' => 'https://google.com',
        ));

        $slackIntegration = factory(Integrations::class)->create([
            'type' => SearchProviderFactory::SLACK,
        ]);

        $this->actingAs($user,'api');
        $response = $this->post('api/v1/search/'.$data);
        $response = $this->assertCount(1, Integrations::all());
    }
}
