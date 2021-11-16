<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class MobileSlack implements SearchProviderInteface
{

    const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
    const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';
    const GRANT_TYPE_SINGLE_CHANNEL = 'false';

    public function search($search): array
    {
        return 123;
    }

     public function getRefreshToken($code)
    {

        $response = Http::asForm()->post(config('stitchel.slack.get_token_url'), [
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'code' => $code,
            'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
            'redirect_uri' => url('api/v1/integrations/type/mobileAppSlack').'/',
            'single_channel' => self::GRANT_TYPE_SINGLE_CHANNEL,
        ]);

        return $response->json();
    }

     public function getToken($slackIntegration)
    {

        $refresh_token = json_decode($slackIntegration->data)->authed_user->refresh_token;

        $response = Http::asForm()->post(config('stitchel.slack.get_token_url'), [
            'client_id' => config('stitchel.slack.client_id'),
            'client_secret' => config('stitchel.slack.client_secret'),
            'refresh_token' => $refresh_token,
            'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
        ]);

        return $response->json();

    }

    public function getCodeUrl()
    {
        $user_id = auth()->user()->id;
        // $user_id = encrypt($id);

        //localhost
        return 'https://slack.com/oauth/v2/authorize?&user_scope=search:read,users.profile:read&state='.$user_id.'&client_id='.config('stitchel.slack.client_id');
    }

     public function getUserInfo($access_token)
    {

        $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$access_token,
        ])->get(config('stitchel.slack.get_userinfo_url'));

        return $response->json();
    }

    public function revokeToken($slackIntegration)
    {

        $access_token = json_decode($slackIntegration->data)->authed_user->access_token;

        $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$access_token,
        ])->get(config('stitchel.slack.revoke_token_url'));

        return $response->json();
    }
}