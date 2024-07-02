<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProductController extends Controller

{


    public function index(Request $request)
    {
        // Lấy danh sách sản phẩm
        $products = Product::all();

        // Xử lý dữ liệu cho DataTables
        $data = DataTables::of($products)
            ->setRowClass(function ($product) {
                return $product->id % 2 == 0 ? 'text-danger' : 'text-primary';
            })
            ->addColumn('actions', function (Product $product) {
                $editUrl = route('products.edit', $product->id);

                $buttons = '<a href="' . $editUrl . '" class="btn btn-warning"><i class="fas fa-pen"></i></a>';
                $buttons .= '<a href= ' . route('products.delete', $product->id) . '  class="btn btn-danger delete-link" onclick="deletebrand()" data-name="' . $product->name . '"><i class="fas fa-trash"></i></a>';
                return $buttons;
            })
            ->rawColumns(['actions']) // Khai báo cột có HTML

            ->toJson();; // Trả về dữ liệu JSON cho DataTables

        // Nếu request là Ajax thì trả về dữ liệu JSON
        if ($request->ajax()) {
            return $data;
        }

        // Nếu không phải Ajax thì render view
        return view('admin.product.index');
    }



    public function add()
    {
        $category = Category::get();
        $brand = Brand::get();
        return view('admin.product.form', compact('category', 'brand'));
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'status' => 'Active',
        ];
        Product::create($data);
        return redirect()->route('products')->with('message', "Sản phẩm {$request->name} đã được thêm thành công.");
    }

    public function edit($id)

    {
        $product = Product::find($id);
        $category = Category::get();
        $brand = Brand::get();
        return view('admin.product.form', compact('category', 'brand', 'product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ];

        Product::find($id)->update($data);

        return redirect()->route('products')->with('message', "Sản phẩm {$product->name} đã được cập nhật.");
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products')->with('message', "Sản phẩm {$product->name} đã được xóa thành công.");
    }
}
