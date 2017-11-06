<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Role;


class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users(Request $request)
    {
        if (Gate::allows('list-users')) {
            $request->user()->authorizeRoles(['admin']);
            $users = User::with('credit')->get();
            return view('manage.users', ['users' => $users]);
        }        
    }

    public function user($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('manage.user', ['user' => $user, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $post = request()->validate([
            'name' => 'required|min:6',
            'id' => 'required|integer',
            'email' => 'required|email',
            'verified' => 'required|integer',
            'count' => 'required|integer',
            'roles' => 'required|array'
        ]);
        $user = User::findOrFail($post['id']);
        $user->fill($post);
        $user->credit->fill($post);
        $user->push();
        $user->roles()->sync(array_key_exists('roles', $post) ? $post['roles']:[]);

        return back()
            ->with('success', 'The user details has been updated.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()
            ->with('success', 'The user has been deleted');
    }
}
