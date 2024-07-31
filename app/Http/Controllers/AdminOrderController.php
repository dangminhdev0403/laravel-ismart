<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    //
       // Phương thức tính toán các biến count
       private function calculateCounts()
       {
           $Pending = Order::where('status', '=', 'pending')->count();
           $Cancel = Order::where('status', '=', 'cancel')->count();
           $Success = Order::where('status', '=', 'success')->count();
            $All =  Order::where('status')->count();
           return compact('Pending', 'Cancel', 'Success','All');
       }
    public function index(){
        $counts = $this->calculateCounts();

        $activeLink = '';
        $active= '';
        $orders = Order::paginate(10);
        return view('admin.orders.index',compact('orders','activeLink','active','counts'));
    }
    public function showByStatus($status){
        $counts = $this->calculateCounts();

        $active= '';
        $activeLink = $status;
        $orders = Order::where('status', '=',$status)->paginate(10);
        return view('admin.orders.index',compact('orders','activeLink','active','counts'));
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
