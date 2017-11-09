<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

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

    public function list(Request $request)
    {
        $get = request()->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'verified' => 'nullable',
            'role' => 'nullable',
            'count' => 'nullable|integer'
        ]);
        if (empty($get)) {
            $users = User::with(['credit', 'roles'])->simplePaginate(10);
            return view('user.list', ['users' => $users]);
        } else {            
            $request->flash();
            $q = User::with(['credit', 'roles']);
            
            if (array_key_exists('name', $get) && !is_null($get['name'])) {
                $q = $q->where('name', 'LIKE', $get['name']);
            }
            if (array_key_exists('email', $get) && !is_null($get['email'])) {
                $q = $q->where('email', 'LIKE', $get['email']);
            }
            if (array_key_exists('verified', $get) && !is_null($get['verified'])) {
                $q = $q->where('verified', $get['verified']);
            }
            if (array_key_exists('role', $get) && !is_null($get['role'])) {
                $q = $q->whereHas('roles', function ($query) use ($get) {
                    $query->where('name', '=', $get['role']);
                });
            }
            if (array_key_exists('count', $get) && !is_null($get['count'])) {
                $q = $q->whereHas('credit', function ($query) use ($get) {
                    $query->where('count', '=', $get['count']);
                    
                });
            }
            $users = $q->simplePaginate(10);
            return view('user.list', ['users' => $users, 'get' => $get]);
        }
        
        
        
        //if (Gate::allows('list-users')) {
            //$request->user()->authorizeRoles(['admin']);
            
        //}        
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('user.show', ['user' => $user, 'roles' => $roles]);
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
