<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentOrderSuccess()
    {
        return redirect('home')->with('payment-success', 'Thank you');
    }
}
