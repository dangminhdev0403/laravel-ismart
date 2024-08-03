<?php

namespace App\Http\Controllers;



use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->keyword ;
        // dd($keyword);
        if($keyword){
            $categories = Category::where('name','like','%'.$keyword.'%')->orderBy('created_at','desc')->paginate(10);
            foreach($categories as $category){
                $category->formatted_date = Carbon::parse($category->created_at)->format('d-m-Y ');
               }
            return view('admin.category.index',compact('categories'));
        }else{
            $categories= Category::paginate(5);
            foreach($categories as $category){
                $category->formatted_date = Carbon::parse($category->created_at)->format('d-m-Y ');
               }

            return view('admin.category.index',compact('categories'));
        }

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
            'categorie' =>0,
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
