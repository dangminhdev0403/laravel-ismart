<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function show()
    {
        $cart = Cart::content();

        return view('product.cart', compact('cart'));
    }
    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        $image = $product->images[0]->image_name;
        // dd($request);
        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $request->input('quantity'),
                'options' => ['image' => $image]
            ]
        );



        return redirect()->route('detailProduct', $product->id)->with('message', 'Thêm vào giỏ hàng thành công');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('message', 'Xoá thành công');
    }



    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.show')->with('message', 'Xoá tất cả thành công');
    }


    public function update(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        Cart::update($rowId, ['qty' => $quantity]);

        return redirect()->route('cart.show')->with('success', 'Cập nhật số lượng thành công');
    }
    public function saveCartToDatabase()
    {
        Cart::store(Auth::id());

        return response()->json(['message' => 'Cart saved to database successfully!']);
    }

    public function restoreCartFromDatabase()
    {
        Cart::restore(Auth::id());

        return response()->json(['message' => 'Cart restored from database successfully!']);
    }

    public function pay(Request $request)
    {

        $list_check = $request->input('products');
        //  dd($list_check);
        $selectedProducts = array_filter($list_check, function ($product) {
            return isset($product['selected']);
        });

        //  dd($selectedProducts);

        if (!empty($selectedProducts)) {
            return view('product.checkout', compact('selectedProducts'));
        } else {

            return redirect()->back()->with('error', 'Chưa có đơn hàng nào được chọn');
        }
    }

    function checkout(Request $request)
    {




        $data = $request->except('rowId');
        //  $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'pending';
        $rowIds = $request->input('rowId', []);





        foreach ($rowIds as $rowId) {
            $item = Cart::get($rowId);
            if($item){
                Cart::remove($rowId);
                Order::create($data);



            }else{
                return "Lỗi";
            }


        }

        return redirect()->route('order.show')->with('message', 'Đặt hàng thành công');

    }
}
