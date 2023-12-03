<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()->sortKeysDesc();
        return view('order.index',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('order.show',compact('order'));
    }
}
