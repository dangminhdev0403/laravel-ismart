<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function show(){
        return view('product.cart');
    }
    public function add(Request $request ,$id){
            $product = Product::find($id) ;
            $image = $product->images[0]->image_name;

            Cart::add(
                [
                    'id'=>$product->id ,
                    'name'=>$product->name ,
                    'price'=>$product->price ,
                    'qty' => 1,
                    'options' => ['image' => $image]
                ]
            );

         
            return view('product.cart');
    }
}
