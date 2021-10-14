<?php

namespace App\Http\Controllers\Modules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
