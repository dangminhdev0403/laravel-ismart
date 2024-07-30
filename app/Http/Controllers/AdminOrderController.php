<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    //
    public function index(){
        $activeLink = '';
        $active= '';
        $orders = Order::paginate(10);
        return view('admin.orders.index',compact('orders','activeLink','active'));
    }
    public function showByStatus($status){
        $active= '';
        $activeLink = $status;
        $orders = Order::where('status', '=',$status)->paginate(10);
        return view('admin.orders.index',compact('orders','activeLink','active'));
    }
    public function updateStatus(Request $request,$id)
    {


        $order = Order::find($id);
        //dd($request->input());

        if ($order) {
            $order->status = $request->status;
            $order->save();

            return redirect()->back();
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
