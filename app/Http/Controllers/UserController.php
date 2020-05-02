<?php

namespace App\Http\Controllers;

use App\Booking;
use App\PickupLocation;
use App\Role;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function view()
    {
        $User = User::all();
        return view('admin.user.view', ['User' => $User]);
    }

    public function getAdd()
    {
        $Role = Role::all();
        return view('admin.user.add', ['Role' => $Role]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'date_of_birth' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'email.required' => 'email field can\'t be empty',
            'password.required' => 'password field can\'t be empty',
            'address.required' => 'address field can\'t be empty',
            'phone.required' => 'phone field can\'t be empty',
            'gender.required' => 'gender field can\'t be empty',
            'role.required' => 'role field can\'t be empty',
            'date_of_birth.required' => 'date of birth field can\'t be empty',
        ]);

        $User = new User;

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->gender = $request->gender;
        $User->id_role = $request->role;
        $User->date_of_birth = $request->date_of_birth;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/user_image', $image);
            $User->image = $image;
        }

        $User->save();

        return redirect('admin/user/view')->with('alert', 'Added new user');
    }

    public function getEdit($id)
    {
        $User = User::find($id);
        $Role = Role::all();
        return view('admin.user.edit', ['User' => $User, 'Role' => $Role]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'date_of_birth' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'email.required' => 'email field can\'t be empty',
            'password.required' => 'password field can\'t be empty',
            'address.required' => 'address field can\'t be empty',
            'phone.required' => 'phone field can\'t be empty',
            'gender.required' => 'gender field can\'t be empty',
            'role.required' => 'role field can\'t be empty',
            'date_of_birth.required' => 'date of birth field can\'t be empty',
        ]);

        $User = User::find($id);

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->gender = $request->gender;
        $User->id_role = $request->role;
        $User->date_of_birth = $request->date_of_birth;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/user_image', $image);
            $User->image = $image;
        }

        $User->save();

        return redirect('admin/user/view')->with('alert', 'User Edit Successful');
    }

    public function getDelete($id)
    {
        $User = User::find($id);
        $User->delete();

        return redirect('admin/user/view')->with('alert', 'Successfully deleted');
    }

    public function viewProfileClient()
    {
        $id = Auth::user()->id;
        $User = User::find($id);
        $UserAll = User::all();
        $Booking = Booking::orderBy('created_at', 'desc')->take(6)->get();
        $Vehicle = Vehicle::all();
        $PickupLocation = PickupLocation::all();
        $array_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        return view('client.profile.profile', ['PickupLocation' => $PickupLocation, 'UserAll' => $UserAll, 'Vehicle' => $Vehicle, 'Booking' => $Booking, 'User' => $User, 'array_month' => $array_month]);
    }

    public function getEditProfileClient()
    {
        $id = Auth::user()->id;
        $User = User::find($id);
        $array_month = array();
        $array_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return view('client.profile.edit_profile', ['User' => $User, 'array_month' => $array_month]);
    }

    public function postEditProfileClient(Request $request, $id)
    {
        $User = User::find($id);

        $User->name = $request->name;
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/user_image', $image);
            $User->image = $image;
        }

        $User->save();
        return redirect('profile/edit') -> with('alert', 'Edit success');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [

        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back();
        } else {
            return back() -> with('alert', 'email or password is incorrect');
        }
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [

        ]);

        $User = new User;

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->id_role = 3;

        $User -> verify_email = 0;

        $User->save();

        $id = $User -> id;
        $verify_email = $User->email;

        Mail::send('mail.verify_mail', [
            'id' => $id,
        ], function ($message) use ($verify_email) {
            $message->to($verify_email, 'Visitor')->subject('Verify your email');
        });

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back();
        }
    }

    public function getVerifyEmail($id)
    {
        $User = User::find($id);
        $User -> verify_email = 1;
        $User -> save();
        return view('client.profile.verify_mail_success');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
