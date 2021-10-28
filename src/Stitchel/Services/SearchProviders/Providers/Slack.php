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
    const GRANT_TYPE_SINGLE_CHANNEL = 'false';

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
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'code' => $code,
            'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
            'redirect_uri' => url('integrations/type/slack').'/',
            'single_channel' => self::GRANT_TYPE_SINGLE_CHANNEL,
        ]);

        dd($response->json());

        // return $response->json();
    }

    //  public function getToken($slackIntegrations)
    // {

    //     $response = Http::post(config('stitchel.slack.get_token_url'), [
    //         'client_id' => config('stitchel.slack.client_id'),
    //         'client_secret' => config('stitchel.slack.client_secret'),
    //         'refresh_token' => $refresh_token,
    //         'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
    //     ]);

        // return $response->json();

    //     dd($slackIntegrations->json());

    // }


    public function getCodeUrl()
    {

        //localhost
        return 'https://slack.com/oauth/v2/authorize?&scope=commands,chat:write,chat:write.public&user_scope=search:read&client_id='.config('stitchel.slack.client_id');
    }
}
