<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::orderBy('order', 'asc')
        ->orderBy('created_at', 'asc')
        ->get();

        $products = Product::orderBy('created_at' , 'desc')->paginate(15);
       // $products_sold = Product::select('total_sold')->orderBy('created_at','desc')->paginate(6);
        //  dd($products_sold);

        //dd($products);
        return view('product.home',compact('products','categories'));
    }

    public function getProductByCategory($slug){
        $categories = Category::orderBy('order', 'asc')
        ->orderBy('created_at', 'asc')
        ->get();
        $category_id = Category::where('slug',$slug)->value('id');
        $products = Product::where('category_id','=',$category_id)->orderBy('created_at', 'desc')->paginate(15);

        return view('product.home',compact('products','categories'));

    }

    public function detailProduct($id){
        $categories = Category::orderBy('order', 'asc')
        ->orderBy('created_at', 'asc')
        ->get();

        $product =Product::find($id);
        $slug = $product ->category->slug;
        $category_id = Category::where('slug',$slug)->value('id');
         $products_same = Product::where('category_id','=',$category_id)->orderBy('created_at', 'desc')->paginate(15);


        return view('product.detail',compact('product','products_same','categories'));
    }

    public function products(){
        $products = Product::all();


        return view('product.products',compact('products'));
    }

    public function blog(){
        return view('product.blog');
    }
    public function about(){
        return view('product.about');
    }
    public function contact(){
        return view('product.contact');
    }
}
