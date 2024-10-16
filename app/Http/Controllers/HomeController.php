<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->limit(10)->get();

        return response()->json($products);
    }

    public function home(Request $request)
    {

        $keyword = $request->keyword1;

        $categories = Category::orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        // dd($keyword);
        if ($keyword) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->orderBy('created_at', 'desc')->get();
        } else {
            $products = Product::orderBy('created_at', 'desc')->get();
        }

        // $products_sold = Product::select('total_sold')->orderBy('created_at','desc')->paginate(6);
        //  dd($products_sold);

        //dd($products);
        return view('product.home', compact('products', 'categories', 'keyword'));
    }

    public function getProductByCategory($slug, Request $request)
    {
        $categories = Category::orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        $category_id = Category::where('slug', $slug)->value('id');
        $category_name = Category::where('slug', $slug)->value('name');
        $select = $request->input('select');
        if ($select === null || $select == 0) {
            $products = Product::where('category_id', '=', $category_id)->orderBy('created_at', 'desc')->get();
        } else {
            if ($select == 1) {

                $products = Product::where('category_id', '=', $category_id)->orderBy('name', 'asc')->get();
            } else if ($select == 2) {
                $products = Product::where('category_id', '=', $category_id)->orderBy('name', 'desc')->get();
            }else if($select == 3){
                $products = Product::where('category_id', '=', $category_id)->orderBy('sale_price', 'asc')->get();
                // dd($products);
            }else if($select == 4){
                $products = Product::where('category_id', '=', $category_id)->orderBy('sale_price', 'desc')->get();
                // dd($products);

            }
            // dd($select);
        }




        return view('product.productsByCategory', compact('products', 'categories', 'category_name' ,'select'));
    }

    public function detailProduct($id)
    {
        $categories = Category::orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $product = Product::find($id);
        $slug = $product->category->slug;
        $category_id = Category::where('slug', $slug)->value('id');
        $products_same = Product::where('category_id', '=', $category_id)->orderBy('created_at', 'desc')->paginate(15);


        return view('product.detail', compact('product', 'products_same', 'categories'));
    }

    public function products()
    {
        $products = Product::all();


        return view('product.products', compact('products'));
    }

    public function blog()
    {
        return view('product.blog');
    }
    public function about()
    {
        return view('product.about');
    }
    public function contact()
    {
        return view('product.contact');
    }
}
