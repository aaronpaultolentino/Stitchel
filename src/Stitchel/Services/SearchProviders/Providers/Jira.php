<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class Jira implements SearchProviderInteface
{

    const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
    const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    /**
     * @param $search
     */
    public function search($search): array
    {
        // $searchItems = [];

        // $jiraIntegrations = Integrations::whereType('jira')->whereUserId(auth()->user()->id)->get();

        // foreach ($jiraIntegrations as $key => $jiraIntegration) {

        //     $code = $jiraIntegration->data;
        //     $token = $this->getToken($jiraIntegration);
        //     $email = $this->getEmail($jiraIntegration);

        //     $messages = Http::withHeaders([
        //         'Authorization' => 'Bearer '.$token['access_token'],
        //     ])->get('https://jiratesting12345.atlassian.net/rest/api/3/issue/'. $email .'/comment?q='.$search)->json();
        //     if($messages['resultSizeEstimate'] == 0){
        //         return [];
        //     }
        // }

        return $searchItems;
    	$searchItems = [];

    	$searchItems[] = [
    		'body' => 'test jira',
    		'type' => SearchProviderFactory::JIRA,
    		'url' => '#'
    	];

    	return $searchItems;
    }

    public function getRefreshToken($code)
    {
        $response = Http::post(config('stitchel.jira.get_token_url'), [
            'code' => $code,
            'client_id' => config('stitchel.jira.client_id'),
            'client_secret' => config('stitchel.jira.client_secret'),
            'redirect_uri' => url('integrations/type/jira').'/',
            'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
        ]);

        return $response->json();
    }

    public function getToken($jiraIntegrations)
    {
        $refresh_token = json_decode($jiraIntegrations->data)->refresh_token;

        $response = Http::post(config('stitchel.jira.get_token_url'), [
            'client_id' => config('stitchel.jira.client_id'),
            'client_secret' => config('stitchel.jira.client_secret'),
            'refresh_token' => $refresh_token,
            'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
        ]);

        return $response->json();
    }

     public function getEmail($jiraIntegration)
    {
        $email = json_decode($jiraIntegration->data)->email;

        return $email;
    }


    public function getCodeUrl()
    {
        return 'https://auth.atlassian.com/authorize?audience=api.atlassian.com&scope=read%3Ame%20offline_access&state=${YOUR_USER_BOUND_VALUE}&redirect_uri='.url('integrations/type/jira/&response_type=code&prompt=consent&client_id='.config('stitchel.jira.client_id'));
    }

    public function getUserInfo($access_token)
    {
        // $response = Http::get(config('stitchel.jira.get_userinfo_url'), [
        //     'Content-Type' =>'application/json',
        //     'Authorization' => 'Bearer '.$access_token,
        // ]);

        $response = Http::withHeaders([
                'Content-Type' =>'application/json',
                'Authorization' => 'Bearer '.$access_token,
            ])->get(config('stitchel.jira.get_userinfo_url'));

        return $response->json();

    }
}
