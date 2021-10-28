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

        $slackIntegrations = Integrations::whereType('slack')->whereUserId(auth()->user()->id)->get();

        foreach ($slackIntegrations as $key => $slackIntegration) {

            $code = $slackIntegration->data;
            $access_token = $this->getToken($slackIntegration);

            $messages = Http::withHeaders([
                'Authorization' => 'Bearer '.$access_token,
            ])->get('https://slack.com/api/search.all?query='.$search)->json();

            foreach ($messages['messages']['matches'] as $key => $message) {
                $messageBody = Http::withHeaders([
                    'Authorization' => 'Bearer '.$access_token,
                ])->get('https://slack.com/api/search.messages?query='.$search)->json();

                $searchItems[] = [
                    'id' => $message['iid'],
                    'body' => $message['type'].' : '.$message['text'],
                    'type' => SearchProviderFactory::SLACK, 
                    'url' => $message['permalink'],
              ];
  
            }

        }
        
        return $searchItems;
    }

     public function getRefreshToken($code)
    {

        $response = Http::asForm()->post(config('stitchel.slack.get_token_url'), [
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'code' => $code,
            'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
            'redirect_uri' => url('integrations/type/slack').'/',
            'single_channel' => self::GRANT_TYPE_SINGLE_CHANNEL,
        ]);

        return $response->json();
    }

     public function getToken($slackIntegration)
    {

        $access_token = json_decode($slackIntegration->data)->authed_user->access_token;

        return $access_token;

    }

    public function getCodeUrl()
    {

        //localhost
        return 'https://slack.com/oauth/v2/authorize?&scope=commands,chat:write,chat:write.public&user_scope=search:read&client_id='.config('stitchel.slack.client_id');
    }

    // public function revokeToken($slackIntegration)
    // {
    //     $refresh_token = json_decode($slackIntegration->data)->refresh_token;

    //     $response = Http::post(config('stitchel.slack.revoke_token_url'), [
    //         'token' => $refresh_token,
    //     ]);

    //     $response->json();
    // }
}
