<?php

namespace App\Http\Controllers\Modules;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

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

        return view('modules.integrations.index', compact('gmailIntegrations', 'slackIntegration', 'jiraIntegration'));
       
    }

     public function store(Request $request)
    {


    }
}
