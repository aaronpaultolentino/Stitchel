<?php

namespace App\Http\Controllers\API\v1\Modules\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

     public function signup(Request $request)
     {

    	$rules = [
            'name' => 'required',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|confirmed'
        ];

        $request->validate($rules);

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

    public function login(Request $request)
    {
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
        $tokenResult = $user->createToken('Stitchel Personal Access Client');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

     public function updateProfile(Request $request)
     {
       $rules = [
            'mobile_number' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'area' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            'password' => ['required', 'same:confirm_password'],
        ];

        $request->validate($rules);

        $users = Auth::User();

        $users->name = $request['name'];
        $users->password = bcrypt($request['password']);
        $users->mobile_number = $request['mobile_number'];
        $users->address = $request['address'];
        $users->postcode = $request['postcode'];
        $users->area = $request['area'];
        $users->country = $request['country'];
        $users->state = $request['state'];

        $users->save();

        return response()->json([
            'Info' => $users,
            'message' => 'Profile has been updated!'
        ]);
     }

    public function logout(Request $request){

    	$request = auth()->user()->token()->revoke();

    	return response()->json([
    		'revoked' => $request,
    		'message' => 'Successfully Logged Out'
    	]);
    }
}
