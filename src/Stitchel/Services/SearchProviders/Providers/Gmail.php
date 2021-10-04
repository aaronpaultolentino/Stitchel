<?php

namespace Stitchel\Services\SearchProviders\Providers;

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

    	$searchItems[] = [
    		'body' => 'test gmail',
    		'type' => SearchProviderFactory::GMAIL
    	];

    	return $searchItems;

    	$token = $this->getToken();
    	$email = 'stitchel.test1@gmail.com';

    	$messages = Http::withHeaders([
		    'Authorization' => 'Bearer '.$token['access_token'],
		])->get('https://gmail.googleapis.com/gmail/v1/users/'. $email .'/messages?q='.$search)->json();

		$searchItems = [];

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
			];
		}

        return $searchItems;
    }

    public function getToken()
    {
    	$response = Http::post(config('stitchel.gmail.get_token_url'), [
		    'client_id' => config('stitchel.gmail.client_id'),
		    'client_secret' => config('stitchel.gmail.client_secret'),
		    'refresh_token' => '1//0dpjGJZKgsJwnCgYIARAAGA0SNwF-L9Ir6xnQwO5K_7aefelPJiHJL1lRgG4HeRAU0Y9wGcPcTZEufKz01-mN213Y6rQy46sJFPo',
		    'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
		]);

		return $response->json();
    }
}
