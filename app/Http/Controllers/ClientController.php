<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function view(){
        $User = User::all();
        $Vehicle = Vehicle::orderBy('view_count', 'desc')->take(6)->get();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();
        return view('client.home.index', ['Feedback' => $Feedback, 'User' => $User, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail]);
    }

    public function about(){
        return view('client.home.about');
    }

    public function errorMiddleware(){
        return view('client.error.errorpermission');
    }
}
