<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
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
            $All =  Order::select('status')->count();
           return compact('Pending', 'Cancel', 'Success','All');
       }
    public function index(Request $request){
      $keyword =  $request->keyword;
        $counts = $this->calculateCounts();
        //? dd($counts);
        $activeLink = '';
        $active= '';
        if($keyword){
            $orders = Order::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orderBy('created_at','desc')->paginate(10);
            return view('admin.orders.index',compact('orders','activeLink','active','counts'));
        }else{
            $orders = Order::paginate(10);
            foreach($orders as $order){
                $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y ');
               }
            return view('admin.orders.index',compact('orders','activeLink','active','counts'));
        }

    }
    public function showByStatus($status){
        $counts = $this->calculateCounts();

        $active= '';
        $activeLink = $status;
        $orders = Order::where('status', '=',$status)->paginate(10);
        foreach($orders as $order){
            $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y ');
           }
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
