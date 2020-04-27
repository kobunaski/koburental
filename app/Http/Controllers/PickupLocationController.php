<?php

namespace App\Http\Controllers;

use App\PickupLocation;
use Illuminate\Http\Request;

class PickupLocationController extends Controller
{
    //
    public function view(){
        $PickupLocation= PickupLocation::all();
        return view('admin.pickup_location.view', ['PickupLocation' => $PickupLocation]);
    }

    public function getAdd(){
        $PickupLocation = PickupLocation::all();
        return view('admin.pickup_location.add', ['PickupLocation' => $PickupLocation]);
    }

    public function postAdd(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'name field can\'t be empty',
            'address.required' => 'address field can\'t be empty',
            'phone.required' => 'phone field can\'t be empty',
        ]);

        $PickupLocation = new PickupLocation;

        $PickupLocation -> name = $request -> name;
        $PickupLocation -> address = $request -> address;
        $PickupLocation -> phone = $request -> phone;

        $PickupLocation -> save();

        return redirect('admin/pickup_location/view') -> with('alert', 'Added new pickup location');
    }

    public function getEdit($id){
        $PickupLocation = PickupLocation::find($id);
        return view('admin.pickup_location.edit', ['PickupLocation' => $PickupLocation]);
    }

    public function postEdit(Request $request, $id){
        $this -> validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'name field can\'t be empty',
            'address.required' => 'address field can\'t be empty',
            'phone.required' => 'phone field can\'t be empty',
        ]);

        $PickupLocation = PickupLocation::find($id);

        $PickupLocation -> name = $request -> name;
        $PickupLocation -> address = $request -> address;
        $PickupLocation -> phone = $request -> phone;

        $PickupLocation -> save();

        return redirect('admin/pickup_location/view') -> with('alert', 'Pickup location Edit Successful');
    }

    public function getDelete($id){
        $PickupLocation = PickupLocation::find($id);
        $PickupLocation -> delete();

        return redirect('admin/pickup_location/view') -> with('alert', 'Successfully deleted');
    }
}
