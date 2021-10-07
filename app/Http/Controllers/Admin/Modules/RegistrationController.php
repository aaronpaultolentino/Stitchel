<?php

namespace App\Http\Controllers\Admin\Modules;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

}