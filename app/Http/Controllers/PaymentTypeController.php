<?php

namespace App\Http\Controllers;

use App\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    //
    public function view(){
        $PaymentType= PaymentType::all();
        return view('admin.payment_type.view', ['PaymentType' => $PaymentType]);
    }

    public function getAdd(){
        return view('admin.payment_type.add');
    }

    public function postAdd(Request $request){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Payment type field can\'t be empty'
        ]);

        $PaymentType = new PaymentType;

        $PaymentType -> name = $request -> name;

        $PaymentType -> save();

        return redirect('admin/payment_type/view') -> with('alert', 'Added new payment type');
    }

    public function getEdit($id){
        $PaymentType = PaymentType::find($id);
        return view('admin.payment_type.edit', ['PaymentType' => $PaymentType]);
    }

    public function postEdit(Request $request, $id){
        $this -> validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Payment type field can\'t be empty'
        ]);

        $PaymentType = PaymentType::find($id);

        $PaymentType -> name = $request -> name;

        $PaymentType -> save();

        return redirect('admin/payment_type/view') -> with('alert', 'Payment Type Edit Successful');
    }

    public function getDelete($id){
        $PaymentType = PaymentType::find($id);
        $PaymentType -> delete();

        return redirect('admin/payment_type/view') -> with('alert', 'Successfully deleted');
    }
}
