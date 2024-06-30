<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
    public function add()

    {
        return view('admin.brand.form');
    }
    public function save(Request $request)

    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => 0,
            'status' => 'Active',
            'parent_id' => 0

        ];

        Brand::create($data);

        return redirect()->route('brand')->with('message', "Thương hiệu {$request->name} đã được thêm thành công.");;
    }

    public function edit($id)

    {
        $brand = Brand::find($id);

        return view('admin.brand.form', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        brand::find($id)->update($data);

        return redirect()->route('brand')->with('message', "Thương hiệu {$brand->name} đã được cập nhật.");
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('brand')->with('message', "Thương hiệu {$brand->name} đã được xóa thành công.");
    }
}

