<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DetailOrderController extends Controller
{
    public function index(){
       $orders = Order::orderBy('created_at','desc')->get() ;

       foreach($orders as $order){
        $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y ');
       }
    //    dd($orders);
        return view('product.order',compact('orders'));
    }
    public function cancel($id){

            $order = Order::find($id) ;
                //dd($order);
                $data = [
                    'status' => "cancel"
                ];
           $order->update($data);

           return redirect()->back()->with('message',"Hủy đơn hàng thành công");
            }

}
