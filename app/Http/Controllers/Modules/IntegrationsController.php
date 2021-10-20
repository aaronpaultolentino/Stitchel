<?php

namespace App\Http\Controllers\Modules;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\Gmail;

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
        $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();
        $slackIntegration = Integrations::whereType('slack')->whereUserId(auth()->user()->id)->get();
        $jiraIntegration = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();

        $gmailIntegrationUrl = $gmail->getCodeUrl();

        return view('modules.integrations.index', compact('gmailIntegrations', 'slackIntegration', 'jiraIntegration', 'gmailIntegrationUrl'));
       
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
}
