<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function checkId ($id){
        if ($id != Auth::user()->id){
            abort(401);
        }
    }

    public function index(){
        $orders = Order::where([['user_id', Auth::user()->id]])->orderByRaw('sent IS NULL DESC, sent DESC, chosen_delivery_time asc')->get();
        $orders->load('dishes');
        return view('admin.orders.index', compact('orders'));
    }

    public function setOrderSent (Request $request){
        $order = Order::where('id', $request->query('postId'))->first();
        $order->sent = Carbon::now();
        $order->update();

        return redirect()->route("admin.orders.index", $order->user_id);
    }
}
