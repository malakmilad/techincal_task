<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function view(){
        return view('admin.payment.create');
    }
    public function charge(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => 100*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of product",
        ]);           
        return back()->with(['success' => 'Payment Success']);
    }
}
