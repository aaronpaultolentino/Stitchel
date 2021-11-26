<?php

namespace App\Http\Controllers\API\v1\Modules\AppIntegration;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MobileAllIntegrationController extends Controller 
{

    public function showAll()
    {
        $integrations = Integrations::all();

        // dd($integrations);

        return response()->json($integrations);
    }
}
