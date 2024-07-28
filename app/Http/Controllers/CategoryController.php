<?php

namespace App\Http\Controllers;



use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories= Category::paginate(5);

        return view('admin.category.index',compact('categories'));
    }
    public function add()

    {
        return view('admin.category.form');
    }
    public function save(Request $request)

    {
        $data = [
            'name' =>$request ->name ,
            'slug' => Str::slug($request->name),
            'order' =>0,
            'status' => 'Active',
            'parent_id' => 0

        ];

        Category::create($data);

        return redirect()->route('category')->with('message', "Danh mục {$request->name} đã được thêm thành công.");;
    }

    public function edit($id)

    {
        $category = Category::find($id);

        return view('admin.category.form',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        Category::find($id)->update($data);

        return redirect()->route('category')->with('message', "Danh mục {$category->name} đã được cập nhật.");
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category')->with('message', "Danh mục {$category->name} đã được xóa thành công.");
    }
}
