<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function makePayment(Request $request, Gateway $gateway) {
        $result = $gateway->transaction()->sale([
            'amount' => "9.99",
            'paymentMethodNonce' => $request->token
        ]);

        return response()->json($result);
    }
}
