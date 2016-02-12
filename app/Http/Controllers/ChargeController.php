<?php

namespace App\Http\Controllers;
use App\Events\PurchaseMade;
use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChargeController extends Controller
{
    //
    public function __construct(){
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function charge(Request $request){
      // Create the charge on Stripe's servers - this will charge the user's card
      try {
        $charge = \Stripe\Charge::create(array(
          "amount" => 1000 * $request->quantity, // amount in cents, again
          "currency" => "usd",
          "source" => $request->stripeToken,
          "description" => "Momma Dees $10 For A Tin No Bake Cookies"
          ));
          $order = Order::Create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'quantity' => $request->quantity
            ]);
            event(new PurchaseMade($order));
            return 'SUCCESS';
      } catch(\Stripe\Error\Card $e) {
        // The card has been declined
        return 'FAILURE';
      }
    }
}
