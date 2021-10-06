<?php

namespace App\Http\Controllers\Admin\Modules;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      

    // public function registration()
    // {
    //     return view('auth.registration');
    // }

    

    // public function signOut() {
    //     Session::flush();
    //     Auth::logout();
  
    //     return Redirect('login');
    // }
}