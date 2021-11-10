<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index(){

    	return auth()->user();

    }

     public function signup(Request $request){

    	$request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        dd($request);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

     public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ]);

    }

    public function logout(Request $request){

    	$request = auth()->user()->token()->revoke();

    	return response()->json([
    		'message' => 'Successfully Logged Out'
    	]);
    }
}
