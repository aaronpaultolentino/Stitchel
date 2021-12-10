<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

     public function signup(Request $request)
     {

    	$request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
        	'User Info' => $user,
            'Message' => 'Successfully created user!'
        ], 200);
    }

    public function logout(Request $request){

    	$request = auth()->user()->token()->revoke();

    	return response()->json([
    		'revoked' => $request,
    		'message' => 'Successfully Logged Out'
    	]);
    }
}
