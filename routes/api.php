<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('execute-payment', function (Request $request) {
    $Booking = \App\Booking::find($request -> booking_ID);
    $Booking -> status = 2;
    $Booking -> save();

    $User = \App\User::where('id', '=', $Booking -> id_user)->first();
    $Location = \App\PickupLocation::where('id', '=', $Booking -> id_pickup_location)->first();
    $Vehicle = \App\Vehicle::where('id', '=', $Booking -> id_vehicle)->first();

    $to_email = $User -> email;

    \Illuminate\Support\Facades\Mail::send('mail.success_order', [
        'Booking' => $Booking,
        'Vehicle' => $Vehicle,
        'User' => $User,
        'PickupLocation' => $Location,
    ], function ($message) use ($to_email) {
        $message->to($to_email, 'Visitor')->subject('Thank you for your payment');
    });

    $Payment = new \App\Payment;

    $Payment -> return_date = $Booking -> return_date;
    $Payment -> id_booking = $Booking -> id;
    $Payment -> total_price = $request -> total_price;

    $Payment -> save();
});
