<?php

namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       return view('modules.profile.index');
    }
    
    /**
     * Update user
     * @param Request $request
     */
    public function update(Request $request, LoggerInterface $logger, UsersRepositoryInterface $userRepository)
    {
        $rules = [
            'email' => [
                'required',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'password' => [
                'same:confirm_password',
            ],
        ];

        $validatedData = $request->validate($rules);

        $user = $userRepository->updateProfile($request->all());

        $logger->log($user, $logger::UPDATE, auth()->user());

        return redirect()->back()->with([
            'status' => 'success',
        ]);
    }
}
