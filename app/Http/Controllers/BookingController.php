<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Feedback;
use App\Manufacture;
use App\Payment;
use App\PickupLocation;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use App\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    //
    public function view()
    {
        $Booking = Booking::all();
        $Vehicle = Vehicle::all();
        $User = User::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.booking.view', ['Booking' => $Booking, 'Vehicle' => $Vehicle, 'User' => $User, 'PickupLocation' => $PickupLocation]);
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

        //This is the confirmation steps
        $step = $request->step;

        //take the pickup date from the user's request
        $pickup_date = $request->pickup_date;
        $time = strtotime($pickup_date);
        $new_pickup_date = date('Y-m-d', $time);

        //take the return date from the user's request
        $return_date = $request->return_date;
        $time2 = strtotime($return_date);
        $new_return_date = date('Y-m-d', $time2);

        if ($step == 0) {
            //use the time limit function to check if the vehicle is
            //available or unavailable
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
                return back()->with([
                    'error' => 'In this date, this vehicle is not available',
                    'pickup_date_error' => $pickup_date,
                    'return_date_error' => $return_date
                ]);
            }
        } else if ($step > 0) {

            //get the days difference between the pickup date
            //and the return date
            $days = Carbon::parse(Session::get('return_date'))
                ->diffInDays(Carbon::parse(Session::get('pickup_date')));

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
        $User = User::find(Auth::user()->id);
        $User->phone = $request->phone;
        $User->address = $request->address;

        //Save the driver license image to the users
        if ($request->hasFile('driver_license')) {
            $file = $request->file('driver_license');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/driver_license_image', $image);
            $User->driver_license = $image;
        }

        //save the record to the user database.
        $User->save();

        $Vehicle = Vehicle::find($id);

        //Create a new booking and add the information from the input
        //to the database.
        $Booking = new Booking;

        $Booking->id_user = Auth::user()->id;
        $Booking->id_staff = 0;
        $Booking->id_vehicle = $request->id_vehicle;
        $Booking->id_pickup_location = $request->id_pickup_location;

        //parse to the right time format
        $time = strtotime($request->pickup_date);
        $new_pickup_date = date('Y-m-d', $time);
        $Booking->pickup_date = Carbon::parse($new_pickup_date);

        $time2 = strtotime($request->return_date);
        $new_return_date = date('Y-m-d', $time2);
        $Booking->return_date = Carbon::parse($new_return_date);

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

        $id_user = $Booking->id_user;
        $User = User::find($id_user);

        $to_email = $User->email;

        Mail::send('mail.confirm_order', [
            'id' => $Booking->id,
        ], function ($message) use ($to_email) {
            $message->to($to_email, 'Visitor')->subject('Please complete your deposit');
        });

        return redirect('profile');
    }

    public function declineOrder($id)
    {
        $Booking = Booking::find($id);

        $Booking->status = 4;
        $Booking->id_staff = Auth::user()->id;

        $Booking->save();
        return redirect('profile');
    }

    public function completeOrder($id)
    {
        $Booking = Booking::find($id);

        $Booking->status = 3;

        $Booking->save();
        return redirect()->back();
    }

    public function extendOrder(Request $request, $id)
    {
        $Booking = Booking::find($id);

        $Booking->return_date;

        $id_vehicle = $Booking->id_vehicle;

        $return_date = $request->return_date;
        $time2 = strtotime($return_date);
        $new_return_date = date('Y-m-d', $time2);

        if ($this->time_limit_extend($id, $id_vehicle, $new_return_date) == true) {
            $Booking -> return_date = Carbon::parse($new_return_date);
            $Booking -> save();

            return redirect()->back()->with('success-extend', 'You have successfully extend the order');
        } else {
            return redirect()->back()->with('no-extend', $id);
        }


    }

    public function paymentOrder($id)
    {
        $Booking = Booking::find($id);
        $PickupLocation = PickupLocation::find($Booking->id_pickup_location);
        $Vehicle = Vehicle::find($Booking->id_vehicle);
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::where('id_vehicle', '=', $Booking->id_vehicle)->first();
        foreach ($Feedback as $item) {
            if ($Vehicle->id == $item->id_vehicle) {
                $rating[] = $item->rating;
            }
        }
        if (isset($rating)) {
            $average_rating = number_format(array_sum($rating) / count($rating), 1);
        } else {
            $average_rating = 0;
        }
        $total_price = $Vehicle->daily_price * (Carbon::parse($Booking->return_date)->diffInDays(Carbon::parse($Booking->pickup_date)));
        return view('client.payment.view', ['total_price' => $total_price, 'VehicleDetail' => $VehicleDetail, 'Booking' => $Booking, 'PickupLocation' => $PickupLocation, 'Vehicle' => $Vehicle, 'average_rating' => $average_rating]);
    }

    public function viewOrder()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    public function viewOrderPending()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '0')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '0')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    public function viewOrderPendingPayment()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '1')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '1')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    public function viewOrderProcessing()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '2')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '2')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    public function viewOrderCompleted()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '3')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '3')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    public function viewOrderDeclined()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $Booking = Booking::where('status', '=', '4')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        } else {
            $Booking = Booking::where('id_user', '=', Auth::user()->id)->where('status', '=', '4')->orderBy('status', 'asc')->paginate(9);
            $Vehicle = Vehicle::all();
            $PickupLocation = PickupLocation::all();
            $User = User::all();
            $Payment = Payment::all();
            return view('client.profile.view_order', [
                'Booking' => $Booking,
                'Vehicle' => $Vehicle,
                'PickupLocation' => $PickupLocation,
                'User' => $User,
                'Payment' => $Payment
            ]);
        }
    }

    function time_limit($id, $new_pickup_date, $new_return_date)
    {
        $Booking = Booking::all();
        $VehicleAll = Vehicle::all();
        $count = 0;

        foreach ($Booking as $item) {
            if ($item->id_vehicle == $id) {
                if ($new_pickup_date >= $item->pickup_date && $new_pickup_date <= $item->return_date) {
                    $array_vehicle_pickup[] = $item->id_vehicle;
                } else if ($new_return_date >= $item->pickup_date && $new_return_date <= $item->return_date) {
                    $array_vehicle_return[] = $item->id_vehicle;
                }
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

    function time_limit_extend($id, $id_vehicle, $new_return_date)
    {
        $Booking = Booking::all();
        $VehicleAll = Vehicle::all();
        $count = 0;

        foreach ($Booking as $item) {
            if ($item->id_vehicle == $id_vehicle) {
                if ($new_return_date >= $item->pickup_date && $new_return_date <= $item->return_date) {
                    $array_vehicle_return[] = $item->id_vehicle;
                } else if ($new_return_date >= $item->return_date && $item -> status != 3 && $item -> status != 4 && $item -> id != $id){
                    $array_vehicle_return[] = $item->id_vehicle;
                }
            }
        }

        if (isset($array_vehicle_return)) {
            return false;
        } else {
            return true;
        }
    }
}
