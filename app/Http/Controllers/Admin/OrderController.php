<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;


class OrderController extends Controller
{
    public function orderList ($userId){

        if (Auth::user()->id != $userId){
            abort(401);
        }

        $orders = Order::where('user_id', $userId)->get()->toArray();

        dd($orders);

        return view('admin.orders.order_list');
    }
}
