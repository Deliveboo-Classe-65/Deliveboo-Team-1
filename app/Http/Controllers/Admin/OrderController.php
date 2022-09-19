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

    public function index($userId){

        $this->checkId($userId);

        $index = Order::where([['user_id', $userId]])->orderByRaw('sent IS NULL DESC, sent DESC, chosen_delivery_time asc')->get();
        $index->load('dishes');
        return view('admin.orders.index', compact('index'));
    }

    public function setOrderSent (Request $request){
        $order = Order::where('id', $request->query('postId'))->first();
        $order->sent = Carbon::now();
        $order->update();

        return redirect()->route("admin.orders_index", $order->user_id);
    }
}
