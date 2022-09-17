<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index($userId){
        $index = Order::where('user_id', $userId)->get()->load('dishes')->toArray();
        dd($index);
    }
}
