<?php

namespace App\Http\Controllers;

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

        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
                'options' => ['image' => $image]
            ]
        );



        return redirect()->route('home');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show');
    }
    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.show');
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

    public function pay(){
      return view('product.order');
    }
}
