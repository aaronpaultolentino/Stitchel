<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
	public function index(){

    	return auth()->user();

    	// return csrf_token(); 

    }

     public function signup(Request $request){

     	// dd($request);

    	$request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        // dd($request);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // dd($user);

        $user->save();

        return response()->json([
        	'User Info' => $user,
            'Message' => 'Successfully created user!'
        ], 200);
    }

    //  public function login(Request $request){

    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //         'remember_me' => 'boolean'
    //     ]);

    //     $credentials = request(['email', 'password']);
    //     if(!Auth::attempt($credentials))
    //         return response()->json([
    //             'message' => 'Unauthorized'
    //         ], 401);

    //     $user = $request->user();

    //     $tokenResult = $user->createToken('Personal Access Token');
    //     $token = $tokenResult->token;

    //     $token->save();

    //     return response()->json([
    //         'access_token' => $tokenResult->accessToken,
    //         'token_type' => 'Bearer',
    //     ]);

    // }

    public function logout(Request $request){

    	$request = auth()->user()->token()->revoke();

    	return response()->json([
    		'revoked' => $request,
    		'message' => 'Successfully Logged Out'
    	]);
    }
}
