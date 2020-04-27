<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function view(){
        $Role= Role::all();
        return view('admin.role.view', ['Role' => $Role]);
    }

    public function getAdd(){
        return view('admin.role.add');
    }

    public function postAdd(Request $request){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Role name field can\'t be empty'
        ]);

        $Role = new Role;

        $Role -> name = $request -> name;

        $Role -> save();

        return redirect('admin/role/view') -> with('alert', 'Added new role');
    }

    public function getEdit($id){
        $Role = Role::find($id);
        return view('admin.role.edit', ['Role' => $Role]);
    }

    public function postEdit(Request $request, $id){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Role name field can\'t be empty'
        ]);

        $Role = Role::find($id);

        $Role -> name = $request -> name;

        $Role -> save();

        return redirect('admin/role/view') -> with('alert', 'Role Edit Successful');
    }

    public function getDelete($id){
        $Role = Role::find($id);
        $Role -> delete();

        return redirect('admin/role/view') -> with('alert', 'Successfully deleted');
    }
}
