<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class MobileGmail implements SearchProviderInteface
{
	const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
	const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    /**
     * @param $search
     */
    public function search($search): array
    {
      return 123;
    }

    public function getRefreshToken($code)
    {

    	$response = Http::post(config('stitchel.gmail.get_token_url'), [
		    'code' => $code,
		    'client_id' => config('stitchel.gmail.client_id'),
		    'client_secret' => config('stitchel.gmail.client_secret'),
		    'redirect_uri' => url('api/v1/integrations/type/mobileAppGmail').'/',
		    'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
		]);

      // dd($response->json());

		return $response->json();

    }

    public function getToken($gmailIntegration)
    {
    	$refresh_token = json_decode($gmailIntegration->data)->refresh_token;

    	$response = Http::post(config('stitchel.gmail.get_token_url'), [
		    'client_id' => config('stitchel.gmail.client_id'),
		    'client_secret' => config('stitchel.gmail.client_secret'),
		    'refresh_token' => $refresh_token,
		    'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
		]);

		return $response->json();
    }

    public function getCodeUrl()
    {

      $user_id = auth()->user()->id;
      // $user_id = encrypt($id);

      // $id = '123';

      // Mobile App Add Button
      return 'https://accounts.google.com/o/oauth2/v2/auth?scope=https://mail.google.com https://www.googleapis.com/auth/userinfo.email&access_type=offline&redirect_uri='.url('api/v1/integrations/type/mobileAppGmail/&state='.$user_id.'&response_type=code&client_id='.config('stitchel.gmail.client_id'));


      // Paste to Google Browser
      // return 'https://accounts.google.com/o/oauth2/v2/auth?scope=https://mail.google.com https://www.googleapis.com/auth/userinfo.email&access_type=offline&redirect_uri=http://localhost/api/v1/integrations/type/mobileAppGmail/&response_type=code&client_id=382106922048-jc5cjs40rm925vhasu1a1gcp1ee8jvc2.apps.googleusercontent.com';
    }

    public function getUserInfo($access_token)
    {
    	$response = Http::get(config('stitchel.gmail.get_userinfo_url'), [
		    'access_token' => $access_token,
		]);

		return $response->json();
    }

    public function revokeToken($gmailIntegration)
    {
      $refresh_token = json_decode($gmailIntegration->data)->refresh_token;

      // dd($access_token);

      $response = Http::post(config('stitchel.gmail.revoke_token_url'), [
        'token' => $refresh_token,
    ]);

      // dd($response->json());
      
      $response->json();
  }
}
