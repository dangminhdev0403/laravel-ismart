<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public function index(){
       $orders = Order::all() ;
    //    dd($orders);
        return view('product.order',compact('orders'));
    }
}
