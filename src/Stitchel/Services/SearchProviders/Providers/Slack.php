<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class Slack implements SearchProviderInteface
{

    const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
    const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    public function search($search): array
    {
    	$searchItems = [];

    	$searchItems[] = [
    		'body' => 'test slack',
    		'type' => SearchProviderFactory::SLACK,
    		'url' => '#'
    	];

    	return $searchItems;
    }

     public function getRefreshToken($code)
    {
        $response = Http::post(config('stitchel.slack.get_token_url'), [
            'code' => $code,
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'redirect_uri' => 'https://stitchel-mvp.herokuapp.com/integrations/type/slack/',
            'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
            'refresh_token' => 'xoxe-1-My0xLTIyOTUyMjA2MjE1NDItMjMzMDE2NjM0MTY2NC0yNTMxMjI4NTI2NDIxLTAyYzJkYjViNWVkY2M0MTliMGYzOTU3OGI4OGFmY2VjNzU1NzM4Y2Y4ZWExZjRkZDc5ZjYyYTJjNTdhZTRhYzU'
        ]);

        dd($response->json());

        // return $response->json();
    }

     public function getToken($slackIntegrations)
    {

        $response = Http::post(config('stitchel.slack.get_token_url'), [
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'refresh_token' => $refresh_token,
            'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
        ]);

        return $response->json();
    }


    public function getCodeUrl()
    {
        // return 'https://auth.atlassian.com/authorize?audience=api.atlassian.com&scope=read%3Ame%20read%3Ajira-work%20offline_access&state=${YOUR_USER_BOUND_VALUE}&return_url='.url('integrations/type/jira/&response_type=code&prompt=consent&client_id='.config('stitchel.jira.client_id'));

        //localhost
        return 'https://slack.com/oauth/v2/authorize?&scope=&user_scope=search:read&client_id='.config('stitchel.slack.client_id');
    }
}
