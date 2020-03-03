<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::users()->get();
        $roles = Role::latest()->get();
        return view('admin.user.index',compact('users','roles'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191|min:5',
            'username' => 'required|string|max:191|min:5',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->save();
        Toastr::info('user successfully added','Success');
        return redirect()->back();


    }
}
