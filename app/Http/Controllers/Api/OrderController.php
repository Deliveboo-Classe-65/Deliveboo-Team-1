<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

use App\Dish;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function makePayment(Request $request, Gateway $gateway)
    {
        if ($request->cart == null) {
            abort(404);
        }
        $cart = $request->cart;
        $restaurantDishes = Dish::where('user_id', $request->restaurant)->get();
        $total = 0;
        foreach ($cart as $item) {
            $dish = $restaurantDishes->find($item["id"]);
            $total += $dish->price * $item["qty"];
        }


        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $request->token
        ]);

        if ($result->success) {
            $newOrder = new Order();
            $newOrder->user_id = $request->restaurant;
            $newOrder->client_name = $request->name;
            $newOrder->client_surname = $request->surname;
            $newOrder->delivery_address = $request->address;
            $newOrder->chosen_delivery_time = $request->delivery;
            $newOrder->client_email = $request->email;
            $newOrder->client_phone = $request->phone;
            $newOrder->total = $total;
            $newOrder->save();

            foreach ($cart as $item) {
                    $newOrder->dishes()->attach(
                        $item['id'],
                        ['quantity' => $item["qty"]]
                    );
                
            }
        }

        $response = [
            'paymentResult' => $result,
            'restaurant' => User::find($request->restaurant)->first()->name
        ];

        return response()->json($response);
    }

    public function generateToken(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        return response()->json($token);
    }
}
