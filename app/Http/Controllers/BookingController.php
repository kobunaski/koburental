<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Manufacture;
use App\PickupLocation;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use App\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    //
    public function view()
    {
        return view('admin.booking.view');
    }

    public function getSuccess()
    {
        return view('client.booking.success');
    }

    public function detailConfirm(Request $request, $id)
    {
        $Vehicle = Vehicle::find($id);
        $VehicleDetail = VehicleDetail::where('id_vehicle', '=', $id)->first();
        $VehicleType = VehicleType::where('id', '=', $Vehicle->id_model)->first();
        $Manufacture = Manufacture::where('id', '=', $VehicleType->id_manufacture)->first();
        $step = $request->step;

        $pickup_date = $request->pickup_date;
        $time = strtotime($pickup_date);
        $new_pickup_date = date('Y-m-d', $time);

        $return_date = $request->return_date;
        $time2 = strtotime($return_date);
        $new_return_date = date('Y-m-d', $time2);

        if ($step == 0) {
            if ($this->time_limit($id, $new_pickup_date, $new_return_date) == true) {
                Session::put('pickup_date', $new_pickup_date);
                Session::put('return_date', $new_return_date);

                return view('client.booking.detail_confirm', [
                    'step' => $step,
                    'Vehicle' => $Vehicle,
                    'VehicleDetail' => $VehicleDetail,
                    'Manufacture' => $Manufacture,
                    'VehicleType' => $VehicleType]);
            } else {
                return back()->with(['error' => 'In this date, this vehicle is not available', 'pickup_date_error' => $pickup_date, 'return_date_error' => $return_date]);
            }
        } else if ($step > 0) {

            $days = Carbon::parse(Session::get('return_date'))->diffInDays(Carbon::parse(Session::get('pickup_date')));

            return view('client.booking.detail_confirm', [
                'days' => $days,
                'step' => $step,
                'Vehicle' => $Vehicle,
                'VehicleDetail' => $VehicleDetail,
                'Manufacture' => $Manufacture,
                'VehicleType' => $VehicleType]);
        }
    }

    public function postConfirm(Request $request, $id)
    {
        $Vehicle = Vehicle::find($id);
        $Booking = new Booking;

        $Booking->id_user = Auth::user()->id;
        $Booking->id_staff = 0;
        $Booking->id_vehicle = $request->id_vehicle;
        $Booking->id_pickup_location = $request->id_pickup_location;

        $time = strtotime($request->pickup_date);
        $new_pickup_date = date('Y-m-d', $time);
        $Booking->pickup_date = Carbon::parse($new_pickup_date);

        $time2 = strtotime($request->return_date);
        $new_return_date = date('Y-m-d', $time2);
        $Booking->return_date = Carbon::parse($new_return_date);

        if ($request->hasFile('driver_license')) {
            $file = $request->file('driver_license');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/driver_license_image', $image);
            $Booking->driver_license = $image;
        }

        $Booking->status = 0;

        $Booking->save();

        return redirect('success')->with('vehicle_name', $Vehicle->name);
    }

    public function confirmOrder($id)
    {
        $Booking = Booking::find($id);

        $Booking->status = 1;
        $Booking->id_staff = Auth::user()->id;

        $Booking->save();
        return redirect('profile');
    }

    public function declineOrder($id)
    {
        $Booking = Booking::find($id);

        $Booking->status = 2;
        $Booking->id_staff = Auth::user()->id;

        $Booking->save();
        return redirect('profile');
    }

    public function viewOrder()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        }
    }

    public function viewOrderPending()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '0')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '0')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        }
    }

    public function viewOrderProcessing()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '1')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '1')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        }}

    public function viewOrderCompleted()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '3')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '3')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        }}

    public function viewOrderDeclined()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '2')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '2')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            return view('client.profile.view_order', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'PickupLocation' => $PickupLocation, 'User' => $User]);
        }}

    function time_limit($id, $new_pickup_date, $new_return_date)
    {
        $Booking = Booking::all();
        $VehicleAll = Vehicle::all();
        $count = 0;

        foreach ($Booking as $item) {
            if ($new_pickup_date >= $item->pickup_day && $new_pickup_date <= $item->drop_day) {
                $array_vehicle_pickup[] = $item->id_vehicle;
            } else if ($new_return_date >= $item->pickup_day && $new_return_date <= $item->drop_day) {
                $array_vehicle_return[] = $item->id_vehicle;
            }
        }

        if (isset($array_vehicle_pickup)) {
            $array_vehicle_pickup_unique = array_unique($array_vehicle_pickup);
            foreach ($array_vehicle_pickup_unique as $item) {
                $available_vehicle[$item] = $item;
            }
        }

        if (isset($array_vehicle_return)) {
            $array_vehicle_return_unique = array_unique($array_vehicle_return);
            sort($array_vehicle_return_unique);
            foreach ($array_vehicle_return_unique as $item) {
                $available_vehicle[$item] = $item;
            }
        }

        foreach ($VehicleAll as $item) {
            if (isset($available_vehicle[$item->id])) {

            } else {
                $array_available_vehicle[] = $item->id;
            }
        }

        foreach ($array_available_vehicle as $item) {
            if ($item == $id) {
                $count++;
            } else {

            }
        }

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }
}
