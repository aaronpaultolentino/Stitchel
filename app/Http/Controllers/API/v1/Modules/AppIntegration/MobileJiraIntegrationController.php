<?php

namespace App\Http\Controllers\API\v1\Modules\AppIntegration;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\MobileJira;



class MobileJiraIntegrationController extends Controller 
{

    /**
     * Show the application integrations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jiraIntegrations = Integrations::whereType('jira')->whereUserId(auth()->user()->id)->get();

        return response()->json($jiraIntegrations);
       
    }

     public function getMobileGetUrl(Request $request)
    {

        $user_id = Auth()->user()->id;
        $dynamic_host = $request->state;
        $MobileJira = new MobileJira();

        $jiraIntegrationUrl = $MobileJira->getCodeUrl($user_id,$dynamic_host);
        return $jiraIntegrationUrl;

    }

	public function getMobileJiraCode(Request $request) 
    {
        $MobileJira = new MobileJira();
        $tokens = $MobileJira->getRefreshToken($request->code);
        $userInfo = $MobileJira->getUserInfo($tokens['access_token']);
        $tokens['code'] = $request->code;
        $state = json_decode($request['state']);
        $tokens['user_id'] = $state->user_id;
        $tokens['dynamic_host'] = $state->dynamic_host;

        $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::JIRA,
            'user_id' => $tokens['user_id'],
        ]);

        $integrations->save();

         return response()->json([
         'message' => 'Success! You may now closed this window.'
        ], 200);
    }

    public function show()
    {
        $integrations = Integrations::whereType('jira')->get();

        return response()->json($integrations);
    }

    public function revokeJiraToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);

        $integration->delete();

         return response()->json([
         'message' => 'Successfully Deleted!'
        ]);
    }
}
