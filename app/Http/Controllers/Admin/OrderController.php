<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function checkId($id)
    {
        if ($id != Auth::user()->id) {
            abort(401);
        }
    }

    public function index()
    {
        $orders = Order::where([['user_id', Auth::user()->id]])->orderByRaw('sent IS NULL DESC, sent DESC, chosen_delivery_time asc')->paginate(15);
        $orders->load('dishes');

        return view('admin.orders.index', compact('orders'));
    }

    public function chart()
    {
        $orders = Order::select(
            DB::raw('sum(total) as sums, count(id) as orders'),
            DB::raw("DATE_FORMAT(created_at,'%Y %m') as months"))
            ->groupBy('months')->where([['user_id', Auth::user()->id]])->where('created_at', '>', Carbon::now()->endOfMonth()->subtract(1, 'year'))
            ->get();

        return view('admin.orders.chart', [
            'orders' => $orders
        ]);
    }

    public function setOrderSent(Request $request)
    {
        $order = Order::where('id', $request->query('postId'))->first();
        $order->sent = Carbon::now();
        $order->update();

        return redirect()->route("admin.orders.index", $order->user_id);
    }
}
