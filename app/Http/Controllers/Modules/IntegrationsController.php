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

       return view('modules.integrations.index');
       
    }

     public function store(Request $request)
    {


        // $user = Auth::user();
        // $integrations = Integrations::create([
        // // $integrations = ([
        //     'data' => $request->code,
        //     'type' => SearchProviderFactory::GMAIL,
        //     'user_id' => $user->id,
        // ]);

        // // dd($integrations);
        // $integrations->save();

        // return view ('modules.integrations.index');
    }
}
