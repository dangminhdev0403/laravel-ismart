<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DetailOrderController extends Controller
{
    public function index(){
       $user_id =  Auth::user()->id;
       $orders = Order::where('user_id','=',$user_id)->orderBy('created_at','desc')->get() ;
        // dd($orders[2]->products);
        foreach($orders as $order){
        $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y ');

       }

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

            public function deleteSelected(Request $request){
                $data = [
                    'status' => "cancel"
                ];
                $products = $request->input('products',[]);
                if($products != null){
                    foreach($products as $id => $value){

                        $order = Order::find($id);
                        $order->update($data);
                    }
                    return redirect()->back()->with('message',"Hủy đơn hàng thành công");
                }else{
                    return redirect()->back()->with('error',"Bạn chưa chọn đơn hàng để huỷ");
                };
            }

}
