<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    //
    public function view(){
        $Manufacture= Manufacture::all();
        return view('admin.manufacture.view', ['Manufacture' => $Manufacture]);
    }

    public function getAdd(){
        return view('admin.manufacture.add');
    }

    public function postAdd(Request $request){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Manufacture name field can\'t be empty'
        ]);

        $Manufacture = new Manufacture;

        $Manufacture -> name = $request -> name;

        $Manufacture -> save();

        return redirect('admin/manufacture/view') -> with('alert', 'Added new manufacture');
    }

    public function getEdit($id){
        $Manufacture = Manufacture::find($id);
        return view('admin.manufacture.edit', ['Manufacture' => $Manufacture]);
    }

    public function postEdit(Request $request, $id){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Manufacture name field can\'t be empty'
        ]);

        $Manufacture = Manufacture::find($id);

        $Manufacture -> name = $request -> name;

        $Manufacture -> save();

        return redirect('admin/manufacture/view') -> with('alert', 'Manufacture Edit Successful');
    }

    public function getDelete($id){
        $Manufacture = Manufacture::find($id);
        $Manufacture -> delete();

        return redirect('admin/manufacture/view') -> with('alert', 'Successfully deleted');
    }
}
