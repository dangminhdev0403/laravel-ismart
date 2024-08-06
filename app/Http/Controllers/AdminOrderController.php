<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    //
    protected function updateProductQuantities($order)
{
    foreach ($order->products as $product) {
        $productInOrder = $order->products->find($product->id);
        if ($productInOrder) {
            $quantity = $productInOrder->pivot->quantity;

            // Kiểm tra số lượng tồn kho trước khi trừ
            if ($product->quantity >= $quantity) {
                $product->decrement('quantity', $quantity);
            } else {
                return redirect()->back()->with('error',"Không dủ số lượng");
            }
        }
    }
}
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
        $user_id = Auth::user()->id ;
      $userProductIds =  Product::where('user_id','=',$user_id)->pluck('id');




        $keyword =  $request->keyword;
           $counts = $this->calculateCounts();
        //? dd($counts);
        $activeLink = '';
        $active= '';
        if($keyword){
            $orders = Order::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orderBy('created_at','desc')->whereHas('products', function($query) use ($userProductIds) {
                $query->whereIn('products.id', $userProductIds);
            })->paginate(10);
            return view('admin.orders.index',compact('orders','activeLink','active','counts'));
        }else{
            $orders = Order::whereHas('products', function($query) use ($userProductIds) {
                $query->whereIn('products.id', $userProductIds);
            })->paginate(10);
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
