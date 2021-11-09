<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index(){

    	return User::all();

    }
}
