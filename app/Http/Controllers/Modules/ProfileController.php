<?php

namespace App\Http\Controllers\Modules;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    	$user = auth()->user();

       return view('modules.profile.index', compact('user'));
       
    }

   /**
     * Update user
     * @param Request $request
     */
     public function update(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'password' => [
                'same:confirm_password',
            ],
        ];

        $validatedData = $request->validate($rules);

        $user =Auth::user();

        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->mobile_number = $request['mobile_number'];
        $user->address = $request['address'];
        $user->postcode = $request['postcode'];
        $user->area = $request['area'];
        $user->country = $request['country'];
        $user->state = $request['state'];

        $user->save();

        return redirect()->back()->with([
            'status' => 'success',
        ]);
    }
}
