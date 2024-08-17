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

        $user_id = Auth::user()->id ;
        $userProductIds =  Product::where('user_id','=',$user_id)->pluck('id');
        $order = Order::whereHas('products', function($query) use ($userProductIds) {
            $query->whereIn('products.id', $userProductIds);
        });

            $Cancel = Order::whereHas('products', function($query) use ($userProductIds) {
                $query->whereIn('products.id', $userProductIds);
            })->where('status', '=', 'cancel')->count();
           $Pending = Order::whereHas('products', function($query) use ($userProductIds) {
            $query->whereIn('products.id', $userProductIds);
        })->where('status', '=', 'pending')->count();
           $Success =Order::whereHas('products', function($query) use ($userProductIds) {
            $query->whereIn('products.id', $userProductIds);
        })->where('status', '=', 'success')->count();
            $All = Order::whereHas('products', function($query) use ($userProductIds) {
            $query->whereIn('products.id', $userProductIds);
        })->select('status')->count();
           return compact('Pending', 'Cancel', 'Success','All');
       }


       public function index(Request $request)
       {
           $user_id = Auth::user()->id;
           $userProductIds = Product::where('user_id', $user_id)->pluck('id');

           $keyword = $request->keyword;
           $counts = $this->calculateCounts();
           $activeLink = '';
           $active = '';

           $ordersQuery = Order::whereHas('products', function($query) use ($userProductIds) {
               $query->whereIn('products.id', $userProductIds);
           });

           if ($keyword) {
               $ordersQuery->where(function($query) use ($keyword) {
                   $query->where('name', 'like', '%' . $keyword . '%')
                         ->orWhere('email', 'like', '%' . $keyword . '%');
               });
           }

           $orders = $ordersQuery->orderBy('created_at', 'desc')->paginate(10);

           foreach($orders as $order) {
               $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y');
           }

           return view('admin.orders.index', compact('orders', 'activeLink', 'active', 'counts'));
       }

    public function showByStatus($status){
       $keyword = request()->input('keyword');
        $user_id = Auth::user()->id ;
        $userProductIds =  Product::where('user_id','=',$user_id)->pluck('id');
        $counts = $this->calculateCounts();
        // dd($counts);
        $active= '';
        $activeLink = $status;
        if($keyword){
            $orders = Order::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orderBy('created_at','desc')->whereHas('products', function($query) use ($userProductIds) {
                $query->whereIn('products.id', $userProductIds);
            })->paginate(10);
            return view('admin.orders.index',compact('orders','activeLink','active','counts'));
        }else{
            $orders = Order::whereHas('products', function($query) use ($userProductIds) {
                $query->whereIn('products.id', $userProductIds);
            })->where('status', '=',$status)->paginate(10);
        foreach($orders as $order){
            $order->formatted_date = Carbon::parse($order->created_at)->format('d-m-Y ');
           }
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
    
    public function delete(Request $request,$id){
        $order = Order::find($id);
             $order->delete();
             return redirect()->back()->with('message',"Xoá thành công");
    }

    public function action(Request $request){
        $data= ['status'=>'success'];
        $orders = $request['list-check-hidden'];
        $act = $request['act'];
        if(!empty($orders)){
            if($act=='delete'){
                foreach($orders as $id){
                    $order = Order::find($id);
                    $order->delete();
                }
                return redirect()->back()->with('message',"Xoá thành công");
            }elseif($act=='canncel'){
                $data['status'] = 'cancel';
                foreach($orders as $id){
                    $order = Order::find($id);
                    $order->update($data);
                }
                return redirect()->back()->with('message',"Cập nhật trạng thái thành công");
            }elseif($act=='success'){
                foreach($orders as $id){
                    $order = Order::find($id);
                    $order->update($data);

                }
                return redirect()->back()->with('message',"Cập nhật trạng thái thành công");
            }elseif($act=='pending'){
                $data['status'] = 'pending';
                foreach($orders as $id){
                    $order = Order::find($id);
                    $order->update($data);
                }
                return redirect()->back()->with('message',"Cập nhật trạng thái thành công");
            }else{
                return redirect()->back()->with('error',"Chưa chọn thao tác");
            }


        }else{
            return redirect()->back()->with('error',"Chưa chọn đơn hàng");
        }


    }
}
