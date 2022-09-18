<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkId ($id){
        if ($id != Auth::user()->id){
            abort(401);
        }
    }

    public function index($userId){

        $this->checkId($userId);

        // $indexNull = Order::where([['user_id', $userId]])
        //     ->whereNull('sent')
        //     ->get();
        // $indexNull->load('dishes');
        $index = Order::where([['user_id', $userId]])->orderByRaw('sent IS NULL DESC, sent DESC, chosen_delivery_time asc')
        // ->whereNotNull('sent')
        ->get();
        $index->load('dishes');
        return view('admin.orders.index', compact('index'));
    }
}
