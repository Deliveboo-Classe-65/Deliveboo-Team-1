<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

use App\Dish;
use App\Order;

class OrderController extends Controller
{
    public function makePayment(Request $request, Gateway $gateway) {
        $cart = $request->cart;
        $total = 0;
        foreach($cart as $item) {
            $dish = Dish::find($item["id"]);
            $total += $dish->price * $item["qty"];
        }
        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $request->token
        ]);
        
        return response()->json($result);
    }

    public function generateToken(Gateway $gateway) {
        $token = $gateway->clientToken()->generate();
        return response()->json($token);
    }
}
