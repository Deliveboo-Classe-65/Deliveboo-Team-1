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

        $index = Order::where('user_id', $userId)->get()->load('dishes');
        return view('admin.orders.index', compact('index'));
    }
}
