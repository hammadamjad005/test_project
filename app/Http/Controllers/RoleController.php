<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show(){

        $role = Role::with('permissions')->get();

        return view('role/role',['role'=>$role]);
    }

    public function view(){
        $permission=Permission::all();
        return view('role/add-role',['permission'=>$permission]);
    }

    public function store(Request $request)
    {
        // Validate 
        $request->validate([
            'name' => 'required|string|max:255',
            'permission' => 'array', // Assuming 'permission' is an array
        ]);

        // Create a new role
        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        // Attach selected permissions to the role
        $permissions = $request->input('permission', []);
        $role->permissions()->sync($permissions);

        // Redirect or return a response as needed
        return redirect('/roles');
    }




    public function delete($id){
        
        $delete=Role::find($id);
        $delete->delete();
        return redirect('/roles');
    }
}
