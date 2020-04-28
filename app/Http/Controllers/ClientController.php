<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contact(){
        return view('client.home.contact');
    }

    public function postContact(Request $request){
        $this -> validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'content_mail' => 'required',
            'subject' => 'required|not_in:0'
        ], [
            'subject.not_in' => 'You haven\'t select a subject'
        ]);

        $email = $request -> email;
        $name = $request -> name;
        $content = $request -> content_mail;
        $subject = $request -> subject;

        Mail::send('mail.contact_mail', [
            'content' => $content,
        ], function ($message) use ($email, $name, $subject) {
            $message->from($email, $name);
            $message->to('koburental@gmail.com')->subject($subject);
        });

        return redirect('contact') -> with('Alert', 'Success');
    }

    public function errorMiddleware(){
        return view('client.error.errorpermission');
    }
}
