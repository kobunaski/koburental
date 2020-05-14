<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Feedback;
use App\Payment;
use App\User;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $User = User::all();

        $Payment = Payment::whereMonth('created_at', '=', Carbon::now()->month)->get();
        $PaymentMonthly = 0;

        $Vehicle = Vehicle::all();
        $Booking = Booking::all();
        $Feedback = Feedback::orderBy('created_at', 'desc')->take(3)->get();

        foreach ($Payment as $item) {
            $PaymentMonthly += $item -> total_price;
        }


        return view('admin.home.home', [
            'User' => $User,
            'PaymentMonthly' => $PaymentMonthly,
            'Vehicle' => $Vehicle,
            'Booking' => $Booking,
            'Feedback' => $Feedback
        ]);
    }

    public function test(){
        return view('test');
    }
}
