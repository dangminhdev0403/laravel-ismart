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
        // Lấy danh sách sản phẩm từ request
        $list_check = $request->input('products', []);

        // Kiểm tra dữ liệu để xem có sản phẩm mặc định không mong muốn
        // dd($list_check);

        // Lọc các sản phẩm đã được chọn
        $selectedProducts = array_filter($list_check, function ($product) {
            // Đảm bảo rằng trường 'selected' có giá trị đúng
            return isset($product['selected']) && $product['selected'];
        });

        // Kiểm tra nếu có sản phẩm được chọn
        if (!empty($selectedProducts)) {
            // Truyền dữ liệu sản phẩm đã chọn vào view
            return view('product.checkout', compact('selectedProducts'));
        } else {
            // Trở lại trang trước với thông báo lỗi
            return redirect()->back()->with('error', 'Chưa có đơn hàng nào được chọn');
        }
    }

    public function payOne(Request $request,$id){
        $product = Product::find($id);
        $image = $product->images[0]->image_name;
        // dd($request);
      $quantity =  $request->input('quantity') ;


        return view('product.checkout', compact('product','quantity'));

    }

    


    function checkout(Request $request)
    {




        if($request->rowId){

            $data = $request->except('rowId');
            $data['user_id'] = auth()->user()->id;
            $data['status'] = 'pending';
            $rowIds = $request->input('rowId', []);
            $order = null;

            foreach ($rowIds as $rowId) {
                $item = Cart::get($rowId);
                $product_id = $item->id ;

                if($item){
                    Cart::remove($rowId);
                    $order =  Order::create($data);
                    $order->products()->attach($product_id,['quantity'=>$item->qty]);


                }else{
                    return "Lỗi";
                }


            }

            return redirect()->route('order.show')->with('message', 'Đặt hàng thành công');

        }else{
            // dd( $data = $request->all());

            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $data['status'] = 'pending';
            Order::create($data);
            return redirect()->route('order.show')->with('message', 'Đặt hàng thành công');
        }





    }
}

