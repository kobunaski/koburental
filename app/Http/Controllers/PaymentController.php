<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Feedback;
use App\Payment;
use App\PickupLocation;
use App\Vehicle;
use App\VehicleDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class PaymentController extends Controller
{
    public function view(){
        $Payment= Payment::all();
        return view('admin.payment.view', ['Payment' => $Payment]);
    }

    public function paymentOrderConfirm(Request $request)
    {
        $id = $request->input('id');
        $Booking = Booking::find($id);
        $Booking -> status = 2;
        $Booking -> save();
        return redirect('payment/success');
    }

    public function paymentOrder($id)
    {
        $Booking = Booking::find($id);
        if (Auth::check()){
            if (Auth::user() -> id == $Booking -> id_user) {
                $PickupLocation = PickupLocation::find($Booking -> id_pickup_location);
                $Vehicle = Vehicle::find($Booking -> id_vehicle);
                $Feedback = Feedback::all();
                $VehicleDetail = VehicleDetail::where('id_vehicle', '=', $Booking -> id_vehicle)->first();
                foreach ($Feedback as $item) {
                    if ($Vehicle -> id == $item->id_vehicle) {
                        $rating[] = $item->rating;
                    }
                }
                if (isset($rating)) {
                    $average_rating = number_format(array_sum($rating) / count($rating), 1);
                } else {
                    $average_rating = 0;
                }
                $total_price = $Vehicle -> daily_price*(Carbon::parse($Booking -> return_date)->diffInDays(Carbon::parse($Booking -> pickup_date)));
                return view('client.payment.view', ['total_price' => $total_price, 'VehicleDetail' => $VehicleDetail, 'Booking' => $Booking, 'PickupLocation' => $PickupLocation, 'Vehicle' => $Vehicle, 'average_rating' => $average_rating]);
            } else {
                return redirect('error');
            }
        } else {
            $PickupLocation = PickupLocation::find($Booking -> id_pickup_location);
            $Vehicle = Vehicle::find($Booking -> id_vehicle);
            $Feedback = Feedback::all();
            $VehicleDetail = VehicleDetail::where('id_vehicle', '=', $Booking -> id_vehicle)->first();
            foreach ($Feedback as $item) {
                if ($Vehicle -> id == $item->id_vehicle) {
                    $rating[] = $item->rating;
                }
            }
            if (isset($rating)) {
                $average_rating = number_format(array_sum($rating) / count($rating), 1);
            } else {
                $average_rating = 0;
            }
            $total_price = $Vehicle -> daily_price*(Carbon::parse($Booking -> return_date)->diffInDays(Carbon::parse($Booking -> pickup_date)));
            return view('client.payment.view', ['total_price' => $total_price, 'VehicleDetail' => $VehicleDetail, 'Booking' => $Booking, 'PickupLocation' => $PickupLocation, 'Vehicle' => $Vehicle, 'average_rating' => $average_rating]);
        }
    }

    public function paymentOrderSuccess()
    {
        return redirect('home')->with('payment-success', 'Thank you');
    }
}
