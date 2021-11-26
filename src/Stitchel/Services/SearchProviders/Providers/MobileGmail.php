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
      $searchItems = [];

      $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();

      foreach ($gmailIntegrations as $key => $gmailIntegration) {

        $code = $gmailIntegration->data;
        $token = $this->getToken($gmailIntegration);
        $email = $this->getEmail($gmailIntegration);

        $messages = Http::withHeaders([
          'Authorization' => 'Bearer '.$token['access_token'],
      ])->get('https://gmail.googleapis.com/gmail/v1/users/'. $email .'/messages?q='.$search)->json();
      if($messages['resultSizeEstimate'] == 0){
        return [];
      }

      foreach ($messages['messages'] as $key => $message) {
        $messageBody = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token'],
        ])->get('https://gmail.googleapis.com/gmail/v1/users/'. $email .'/messages/'.$message['id'])->json();

        // dd($messageBody);

        $searchItems[] = [
          'id' => $messageBody['id'],
          'body' => $messageBody['snippet'],
          'type' => SearchProviderFactory::GMAIL,
          'url' => 'https://mail.google.com/mail/u/0/#inbox/'.$messageBody['id'],
        ];

      }

    }   
        // dd($searchItems);
        return $searchItems;

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

    public function getEmail($gmailIntegration)
    {
      $email = json_decode($gmailIntegration->data)->email;

      return $email;
    }

    public function getCodeUrl()
    {

      $user_id = auth()->user()->id;

      // Mobile App Add Button
      return 'https://accounts.google.com/o/oauth2/v2/auth?scope=https://mail.google.com https://www.googleapis.com/auth/userinfo.email&access_type=offline&redirect_uri='.url('api/v1/integrations/type/mobileAppGmail/&state='.$user_id.'&response_type=code&client_id='.config('stitchel.gmail.client_id'));
    }

    public function getUserInfo($access_token)
    {
    	$response = Http::get(config('stitchel.gmail.get_userinfo_url'), [
		    'access_token' => $access_token,
		]);

		return $response->json();
    }

    public function gmailRevokeToken($gmailIntegration)
    {
      $refresh_token = json_decode($gmailIntegration->data)->refresh_token;

      $response = Http::post(config('stitchel.gmail.revoke_token_url'), [
        'token' => $refresh_token,
    ]);
      
      $response->json();
  }
}
