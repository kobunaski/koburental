<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $User = User::all();
        return view('admin.home.home', ['User' => $User]);
    }
}
