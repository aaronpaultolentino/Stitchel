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

        $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();
        $slackIntegration = Integrations::whereType('slack')->whereUserId(auth()->user()->id)->get();
        $jiraIntegration = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();

        $gmailIntegrationUrl = 'https://accounts.google.com/o/oauth2/v2/auth?scope=https://mail.google.com&access_type=offline&redirect_uri='.url('integrations/type/gmail/&response_type=code&client_id='.config('stitchel.gmail.client_id'));

        return view('modules.integrations.index', compact('gmailIntegrations', 'slackIntegration', 'jiraIntegration', 'gmailIntegrationUrl'));
       
    }

    public function getGmailCode(Request $request)
    {
        $gmail = new Gmail();
        $tokens = $gmail->getRefreshToken($request->code);
        $tokens['code'] = $request->code;

        $integrations = Integrations::create([
            'data' => json_encode($tokens),
            'type' => SearchProviderFactory::GMAIL,
            'user_id' => auth()->user()->id,
        ]);

        $integrations->save();

        return redirect()->route('integrations');
        
    }

    public function revokeToken($id)
    {
        $integrations = Integrations::findOrFail($id);
        $integrations->delete();

         return redirect()->route('integrations')
                        ->with('success','Integrations deleted successfully');
    }
}
