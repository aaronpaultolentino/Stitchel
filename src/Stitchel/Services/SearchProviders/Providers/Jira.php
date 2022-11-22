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
        $searchItems = [];

        $jiraIntegrations = Integrations::whereType('jira')->whereUserId(auth()->user()->id)->get();

        foreach ($jiraIntegrations as $key => $jiraIntegration) {

            $code = $jiraIntegration->data;
            $dynamicHost = (json_decode($jiraIntegration->data)->dynamic_host);
            $token = $this->getToken($jiraIntegration);
            $email = $this->getEmail($jiraIntegration);
            $appToken = config('stitchel.jira.app_token');

            $messages = Http::withHeaders([
                'Authorization' => 'Basic '. base64_encode($email.':'.$appToken),
            ])->get('https://'.$dynamicHost.'.atlassian.net/rest/api/3/issue/picker?query='.$search)->json();
            if($messages == 0){
                return [];
            }
            foreach ($messages['sections'][0]['issues'] as $key => $message) {
                $searchItems[] = [
                    'id' => $message['id'],
                    'body' => $message['summaryText'],
                    'url' => 'https://'.$dynamicHost.'.atlassian.net/browse/'.$message['key'],
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
        return 'https://auth.atlassian.com/authorize?audience=api.atlassian.com&scope=read%3Ame%20read%3Ajira-work%20offline_access&redirect_uri='.url('integrations/type/jira&response_type=code&prompt=consent&client_id='.config('stitchel.jira.client_id'));

        https://auth.atlassian.com/authorize?audience=api.atlassian.com&client_id=Vv7sUP85YMR5GFonZKi81NKZxlLSSNdg&scope=write%3Aconfluence-content%20read%3Aconfluence-space.summary%20write%3Aconfluence-space%20write%3Aconfluence-file%20read%3Aconfluence-props%20write%3Aconfluence-props%20manage%3Aconfluence-configuration%20read%3Aconfluence-content.all%20read%3Aconfluence-content.summary%20search%3Aconfluence%20read%3Aconfluence-content.permission%20read%3Aconfluence-user%20read%3Aconfluence-groups%20write%3Aconfluence-groups%20readonly%3Acontent.attachment%3Aconfluence&redirect_uri=http%3A%2F%2Flocalhost%2Fintegrations%2Ftype%2Fjira&state=${YOUR_USER_BOUND_VALUE}&response_type=code&prompt=consent
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
