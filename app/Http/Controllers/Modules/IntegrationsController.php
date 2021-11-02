<?php

namespace App\Http\Controllers\Modules;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\Gmail;
use Stitchel\Services\SearchProviders\Providers\Jira;
use Stitchel\Services\SearchProviders\Providers\Slack;

class IntegrationsController extends Controller
{
    /**
     * Show the application integrations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gmail = new Gmail();
        $jira = new Jira();
        $slack = new Slack();
        $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();
        $slackIntegrations = Integrations::whereType('slack')->whereUserId(auth()->user()->id)->get();
        $jiraIntegrations = Integrations::whereType('jira')->whereUserId(auth()->user()->id)->get();

        $gmailIntegrationUrl = $gmail->getCodeUrl();
        $jiraIntegrationUrl = $jira->getCodeUrl();
        $slackIntegrationUrl = $slack->getCodeUrl();

        return view('modules.integrations.index', compact('gmailIntegrations', 'slackIntegrations', 'jiraIntegrations', 'gmailIntegrationUrl', 'jiraIntegrationUrl', 'slackIntegrationUrl'));
       
    }

    public function getGmailCode(Request $request)
    {
        $gmail = new Gmail();
        $tokens = $gmail->getRefreshToken($request->code);
        $userInfo = $gmail->getUserInfo($tokens['access_token']);
        $tokens['code'] = $request->code;

        $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::GMAIL,
            'user_id' => auth()->user()->id,
        ]);

        $integrations->save();

        return redirect()->route('integrations');
        
    }

    public function getJiraCode(Request $request)
    {
         
        $jira = new Jira();
        $tokens = $jira->getRefreshToken($request->code);
        $userInfo = $jira->getUserInfo($tokens['access_token']);
        $tokens['code'] = $request->code;


        $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::JIRA,
            'user_id' => auth()->user()->id,
        ]);

        $integrations->save();

        return redirect()->route('integrations');
           
    }

     public function getSlackCode(Request $request)
    {

        $slack = new Slack();
        $tokens = $slack->getRefreshToken($request->code);
        $userInfo = $slack->getUserInfo($tokens['authed_user']['access_token']);
        $tokens['code'] = $request->code;

         $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::SLACK,
            'user_id' => auth()->user()->id,
        ]);

        $integrations->save();

        return redirect()->route('integrations');
        
    }

    public function revokeToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);
        $gmail = new Gmail();

        $gmail->revokeToken($integration);

        $integration->delete();

         return redirect()->route('integrations')
                        ->with('success','Integrations deleted successfully');
    }

     public function slackRevokeToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);
        $slack = new Slack();

        $slack->slackRevokeToken($integration);

        $integration->delete();

         return redirect()->route('integrations')
                        ->with('success','Integrations deleted successfully');
    }
}
