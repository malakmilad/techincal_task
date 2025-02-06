<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('admin.payment.create');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'stripeToken' => 'required',
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount'      => 1000,
                'currency'    => 'usd',
                'source'      => $request->stripeToken,
                'description' => 'Test Payment from Laravel',
            ]);

            return redirect()->route('payment.form')->with('success', 'Payment successful!');
        } catch (CardException $e) {
            return redirect()->route('payment.form')->with('error', $e->getMessage());
        }
    }
}
