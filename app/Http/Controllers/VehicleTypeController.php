<?php

namespace App\Http\Controllers;

use App\Manufacture;
use App\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    //
    public function view(){
        $VehicleType= VehicleType::all();
        $Manufacture = Manufacture::all();
        return view('admin.vehicle_type.view', ['VehicleType' => $VehicleType, 'Manufacture' => $Manufacture]);
    }

    public function getAdd(){
        $Manufacture = Manufacture::all();
        return view('admin.vehicle_type.add', ['Manufacture' => $Manufacture]);
    }

    public function postAdd(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'id_manufacture' => 'required',
        ],[
            'name.required' => 'User name field can\'t be empty',
            'id_manufacture.required' => 'Manufacture field can\'t be empty',
        ]);

        $VehicleType = new VehicleType;

        $VehicleType -> name = $request -> name;
        $VehicleType -> id_manufacture = $request -> id_manufacture;

        $VehicleType -> save();

        return redirect('admin/vehicle_type/view') -> with('alert', 'Added new model');
    }

    public function getEdit($id){
        $VehicleType = VehicleType::find($id);
        $Manufacture = Manufacture::all();
        return view('admin.vehicle_type.edit', ['VehicleType' => $VehicleType, 'Manufacture' => $Manufacture]);
    }

    public function postEdit(Request $request, $id){
        $this -> validate($request, [
            'name' => 'required',
            'id_manufacture' => 'required',
        ],[
            'name.required' => 'User name field can\'t be empty',
            'id_manufacture.required' => 'Manufacture field can\'t be empty',
        ]);

        $VehicleType = VehicleType::find($id);

        $VehicleType -> name = $request -> name;
        $VehicleType -> id_manufacture = $request -> id_manufacture;

        $VehicleType -> save();

        return redirect('admin/vehicle_type/view') -> with('alert', 'Model Edit Successful');
    }

    public function getDelete($id){
        $VehicleType = VehicleType::find($id);
        $VehicleType -> delete();

        return redirect('admin/vehicle_type/view') -> with('alert', 'Successfully deleted');
    }
}
