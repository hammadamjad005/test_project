<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){

        $user = User::with('roles')->get();

        return view('user/users',['user'=>$user]);
    }

    public function view(){
        $roles=Role::all();
        return view('user/add-user',['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        // Attach roles to the user
        $user->roles()->sync($request->input('roles'));
    
        // Redirect or return a response as needed
        return redirect('/users');
    }


    public function delete($id){
        
        $delete=User::find($id);
        $delete->delete();
        return redirect('/users');
    }
}
