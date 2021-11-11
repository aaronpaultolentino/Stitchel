<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller 
{

	public function login(Request $request) {

	// 	$login = $request->validate([
	// 		'email' => 'required|string',
	// 		'password' => 'required|string'
	// 	]);

	// 	 if(Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])){
 //            $user = Auth::guard('web')->user();
	// 		$accessToken['token'] =  $user->createToken('Auth Token')->accessToken;
			
	// 		return response (['user' => Auth::user(), 'accessToken' => $accessToken]);
	// 	}

	// 	return response (['message' => 'Invalid login credentials.']);
	// }
}
