<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = \Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $post = request()->validate([
            'name' => 'required|min:6'
        ]);
        
        \Auth::user()->fill($post)->save();

        return back()
            ->with('success-details', 'Your details updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $post = request()->validate([
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $user = \Auth::user();
        $hashPassword = $user->password;
        
        if (\Hash::check($post['old'], $hashPassword)) {
            $user->fill([
                'password' => \Hash::make($post['password'])
            ])->save();
            return back()
                ->with('success-password', 'Your password has been changed');
        }
    }
}
