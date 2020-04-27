<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleDetail;
use Illuminate\Http\Request;

class VehicleDetailController extends Controller
{
    //
    public function getAdd($id)
    {
        $Vehicle = Vehicle::find($id);
        $VehicleDetailAll = VehicleDetail::all();
        $VehicleExist = false;
        foreach ($VehicleDetailAll as $item) {
            if ($item -> id_vehicle == $id) {
                $IdVehicleDetail = $item -> id;
                $VehicleExist = true;
            }
        }
        if (!isset($IdVehicleDetail)){
            $VehicleDetail = 0;
        } else {
            $VehicleDetail = VehicleDetail::find($IdVehicleDetail);
        }
        return view('admin.vehicle_detail.add', ['Vehicle' => $Vehicle, 'VehicleExist' => $VehicleExist, 'VehicleDetail' => $VehicleDetail]);
    }

    public function postAdd(Request $request, $id)
    {
        $VehicleDetail = new VehicleDetail;

        $VehicleDetail->id_vehicle = $id;
        $VehicleDetail->seat = $request->seat;
        $VehicleDetail->door = $request->door;
        $VehicleDetail->fuel = $request->fuel;
        if ($request->air_con == 1) {
            $VehicleDetail->air_con = $request->air_con;
        } else {
            $VehicleDetail->air_con = 0;
        }
        if ($request->bluetooth == 1) {
            $VehicleDetail->bluetooth = $request->bluetooth;
        } else {
            $VehicleDetail->bluetooth = 0;
        }
        $VehicleDetail->gearbox = $request->gearbox;

        $VehicleDetail->save();

        return redirect('admin/vehicle/view/')->with('alert', 'Successfully add new attributes');
    }

    public function postEdit(Request $request, $id)
    {
        $VehicleDetail = VehicleDetail::find($id);

        $VehicleDetail->seat = $request->seat;
        $VehicleDetail->door = $request->door;
        $VehicleDetail->fuel = $request->fuel;
        if ($request->air_con == 1) {
            $VehicleDetail->air_con = $request->air_con;
        } else {
            $VehicleDetail->air_con = 0;
        }
        if ($request->bluetooth == 1) {
            $VehicleDetail->bluetooth = $request->bluetooth;
        } else {
            $VehicleDetail->bluetooth = 0;
        }
        $VehicleDetail->gearbox = $request->gearbox;

        $VehicleDetail->save();

        return redirect('admin/vehicle/view/')->with('alert', 'Successfully edit car attributes');
    }
}
