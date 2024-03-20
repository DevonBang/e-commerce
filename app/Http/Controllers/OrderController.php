<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;

class OrderController extends Controller
{
    public function index_admin() {
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('Admin.order.index')->with('orders', $orders);
    }
    public function detail_admin($id) {
        $orders = Order_item::where('order_id', $id)->paginate(5);
        return view('Admin.order.detail')->with('orders', $orders);
    }
}
