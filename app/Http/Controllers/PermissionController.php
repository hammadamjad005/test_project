<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function show(){

        $permission=Permission::all();
        return view('permission/permission',['permission'=>$permission]);
    }

    public function view(){

        return view('permission/add-permission');
    }

    public function store(Request $request){

       $store=new Permission();
       $store->name=$request->name;
       $store->save();
       return redirect('/permissions');
    }

    public function delete($id){
        
        $delete=Permission::find($id);
        $delete->delete();
        return redirect('/permissions');
    }

}
