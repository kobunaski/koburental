<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Manufacture;
use App\PickupLocation;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use App\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //
    public function view()
    {
        $Vehicle = Vehicle::all();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.view', ['Vehicle' => $Vehicle, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function viewClient()
    {
        $Vehicle = Vehicle::orderBy('name', 'asc')->paginate(6);
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();
        return view('client.vehicle.view', ['Feedback' => $Feedback, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function viewDetailClient($id)
    {
        $Vehicle = Vehicle::find($id);
        $User = User::all();
        $VehicleDetail = VehicleDetail::all();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        foreach ($Feedback as $item){
            if ($id == $item -> id_vehicle){
                $rating[] = $item -> rating;
            }
        }
        if (isset($rating)){
            $average_rating = number_format(array_sum($rating)/count($rating), 1);
        } else {
            $average_rating = 0;
        }

        $Vehicle -> view_count = ($Vehicle -> view_count + 1);

        $Vehicle -> save();

        return view('client.vehicle.viewdetail', ['average_rating' => $average_rating, 'User' => $User, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation, 'Feedback' => $Feedback ]);
    }

    public function getAdd()
    {
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.add', ['VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_model' => 'required',
            'id_pickup_location' => 'required',
            'daily_price' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'id_model.required' => 'Model field can\'t be empty',
            'id_pickup_location.required' => 'Pickup Location field can\'t be empty',
            'daily_price.required' => 'Price field can\'t be empty',
        ]);

        $Vehicle = new Vehicle;

        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            $image = $file -> getClientOriginalName();
            $file -> move('upload/image/vehicle_image', $image);
            $Vehicle -> image = $image;
        }

        $Vehicle->save();

        return redirect('admin/vehicle/view')->with('alert', 'Added new vehicle');
    }

    public function getEdit($id)
    {
        $Vehicle = Vehicle::find($id);
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.edit', ['Vehicle' => $Vehicle, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_model' => 'required',
            'id_pickup_location' => 'required',
            'daily_price' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'id_model.required' => 'Model field can\'t be empty',
            'id_pickup_location.required' => 'Pickup Location field can\'t be empty',
            'daily_price.required' => 'Price field can\'t be empty',
        ]);

        $Vehicle = Vehicle::find($id);

        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            $image = $file -> getClientOriginalName();
            $file -> move('upload/image/vehicle_image', $image);
            $Vehicle -> image = $image;
        }

        $Vehicle->save();

        return redirect('admin/vehicle/view')->with('alert', 'Model Edit Successful');
    }

    public function getDelete($id)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();

        return redirect('admin/vehicle/view')->with('alert', 'Successfully deleted');
    }
}
