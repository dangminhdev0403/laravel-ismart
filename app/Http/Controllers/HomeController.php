<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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

        $status = "";
        $categories = Category::orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        $category_id = Category::where('slug', $slug)->value('id');
        $category_name = Category::where('slug', $slug)->value('name');


        $select = $request->input('sort');
        $price = $request->input('price');



        $query = Product::where('category_id', '=', $category_id);

        if ($select === null) {
            // Nếu không có điều kiện sắp xếp
            $query->orderBy('created_at', 'desc');
        } else {
            // Sắp xếp theo điều kiện được chọn
            switch ($select) {
                case 1:
                    $query->orderBy('name', 'asc');
                    break;
                case 2:
                    $query->orderBy('name', 'desc');
                    break;
                case 3:
                    $query->orderByRaw('CASE WHEN sale_price = 0 THEN price ELSE sale_price END')->orderBy('sale_price', 'desc');
                    break;
                case 4:
                    $query->orderByRaw('CASE WHEN sale_price = 0 THEN price ELSE sale_price END')->orderBy('sale_price', 'asc');
                    break;
            }
        }


        if ($price === 'null') {
            $price = null ;
            $status = "null";
        }
        if ($price != null ) {

            $parts = explode('-', $price);

            $status = $parts[0];

            $min = (float)$parts[1] *1000 ;
            $max = (float)$parts[2] * 1000 ;

            // Chỉ cần gán giá trị tối đa
            if ($status == "t5") {
                $max = PHP_INT_MAX; // Không cần sử dụng str_replace
            }

            $query->whereBetween(DB::raw('CASE WHEN sale_price = 0 THEN price ELSE sale_price END'), [$min, $max]);
            //             $sql = $query->toSql();
// dd($sql);
        }


        // Lấy danh sách sản phẩm thỏa mãn điều kiện
        $products = $query->get();

        return view('product.productsByCategory', compact('products', 'categories', 'category_name', 'select', 'status'));
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
