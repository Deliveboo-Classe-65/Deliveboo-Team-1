<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where([['user_id', Auth::user()->id]])->whereNull('sent')->orderByRaw('sent IS NULL DESC, sent DESC, chosen_delivery_time asc')->get();
        $orders->load('dishes');
        
        return view('admin.home', compact('orders'));
    }
}
