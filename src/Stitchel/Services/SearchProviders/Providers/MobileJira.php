<?php

namespace Stitchel\Services\SearchProviders\Providers;

use App\Integrations;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class MobileJira implements SearchProviderInteface
{
	const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
	const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    /**
     * @param $search
     */
    public function search($search): array
    {
      $searchItems = [];

        $jiraIntegrations = Integrations::whereType('jira')->whereUserId(auth()->user()->id)->get();

        foreach ($jiraIntegrations as $key => $jiraIntegration) {

            $code = $jiraIntegration->data;
            $token = $this->getToken($jiraIntegration);
            $email = $this->getEmail($jiraIntegration);
            $appToken = config('stitchel.jira.app_token');
            
            $messages = Http::withHeaders([
                'Authorization' => 'Basic '. base64_encode($email.':'.$appToken),
            ])->get('https://stitcheljira123.atlassian.net/rest/api/3/issue/picker?query='.$search)->json();
            if($messages == 0){
                return [];
            }

            foreach ($messages['sections'][0]['issues'] as $key => $message) {
                $searchItems[] = [
                    'id' => $message['id'],
                    'body' => $message['summaryText'],
                    'url' => 'https://stitcheljira123.atlassian.net/browse/'.$message['key'],
                    'type' => SearchProviderFactory::JIRA, 

                ];
  
            }

        }
        
        return $searchItems;
    }

        public function getRefreshToken($code)
    {
        $response = Http::post(config('stitchel.jira.get_token_url'), [
            'code' => $code,
            'client_id' => config('stitchel.jira.client_id'),
            'client_secret' => config('stitchel.jira.client_secret'),
            'redirect_uri' => url('api/v1/integrations/type/mobileAppJira').'/',
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

      $user_id = auth()->user()->id;

      // dd($id);
      // $user_id = encrypt($id);

        return 'https://auth.atlassian.com/authorize?audience=api.atlassian.com&scope=read%3Ame%20read%3Ajira-work%20offline_access&redirect_uri='.url('api/v1/integrations/type/mobileAppJira&state='.$user_id.'&response_type=code&prompt=consent&client_id='.config('stitchel.jira.client_id'));

        //auth.atlassian.com/authorize?audience=api.atlassian.com&scope=read%3Ame%20read%3Aaccount&redirect_uri=http%3A%2F%2Flocalhost%2Fapi%2Fv1%2Fintegrations%2Ftype%2FmobileAppJira&state=${YOUR_USER_BOUND_VALUE}&response_type=code&prompt=consent
        
    }

    public function getUserInfo($access_token)
    {

        $response = Http::withHeaders([
                'Content-Type' =>'application/json',
                'Authorization' => 'Bearer '.$access_token,
            ])->get(config('stitchel.jira.get_userinfo_url'));

        return $response->json();

    }

}
