<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index(){
        $activeLink= '';
        $orders = Order::paginate(10);
        return view('admin.orders.index',compact('orders','activeLink'));
    }
    public function showByStatus($status){
        $activeLink = $status;
        $orders = Order::where('status', '=',$status)->paginate(10);
        return view('admin.orders.index',compact('orders','activeLink'));
    }
}
