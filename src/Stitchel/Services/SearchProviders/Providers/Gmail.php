<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class Gmail implements SearchProviderInteface
{
	const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';

    /**
     * @param $search
     */
    public function search($search): array
    {
    	$searchItems = [];

    	// $searchItems[] = [
    	// 	'body' => 'test gmail',
    	// 	'type' => SearchProviderFactory::GMAIL
    	// ];

    	// return $searchItems;
    	// $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();

    	// foreach ($gmailIntegrations as $key => $gmailIntegration) {

    	// 	$code = $gmailIntegration->data;
    		$code =  '1//0dYEyIBn8zOgRCgYIARAAGA0SNwF-L9IriSjxkLlNty5e8CzACLLScwfFxtILXeEHLwBq1HVSTAsfpQfWyJ0fN8FJXp70UlTPbsI';
    		// $code =  '4/0AX4XfWjuDd-xtVR6Z6OaslkAobRr7g4Ez8brhJrk0_Hdh6pqEPp6nAfEh8O-8b239dAgBg';
	    	$token = $this->getToken($code);
	    	$email = 'aaron@eventleap.com';

	    	$messages = Http::withHeaders([
			    'Authorization' => 'Bearer '.$token['access_token'],
			])->get('https://gmail.googleapis.com/gmail/v1/users/'. $email .'/messages?q='.$search)->json();
	    	var_dump($messages);exit;
			if($messages['resultSizeEstimate'] == 0){
				return [];
			}

			foreach ($messages['messages'] as $key => $message) {
				$messageBody = Http::withHeaders([
				    'Authorization' => 'Bearer '.$token['access_token'],
				])->get('https://gmail.googleapis.com/gmail/v1/users/'. $email .'/messages/'.$message['id'])->json();

				$searchItems[] = [
					'id' => $messageBody['id'],
					'body' => $messageBody['snippet'],
					'type' => SearchProviderFactory::GMAIL,
					'url' => 'https://mail.google.com/mail/u/0/#inbox/'.$messageBody['id'],
				];
			}

		// }

        return $searchItems;
    }

    public function getToken($code)
    {
    	$response = Http::post(config('stitchel.gmail.get_token_url'), [
		    'client_id' => config('stitchel.gmail.client_id'),
		    'client_secret' => config('stitchel.gmail.client_secret'),
		    'refresh_token' => $code,
		    'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
		]);
    	// var_dump($response->json());exit;
		return $response->json();
    }
}
