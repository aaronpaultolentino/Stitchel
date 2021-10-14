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

        $integrations = Integrations::all();

       return view('modules.integrations.index',compact('integrations', $integrations));
       
    }

     public function store(Request $request)
    {


    }
}
