<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('profile.index', ['user' => $user]);
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
    
    public function storePassword(Request $request)
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
