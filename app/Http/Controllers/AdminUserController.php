<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    public function index(Request $request){
        //dd(Auth::user());
        $keyword = $request->keyword ;
        // dd($keyword);
        if($keyword){
            $users = User::where('name','like','%'.$keyword.'%')->where('id','!=',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
            foreach($users as $user){
                $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
               }
            //    dd($users->total());
               return view('admin.users.index',compact('users'));
        }
        $users = User::where('id','!=',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        foreach($users as $user){
            $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
           }
        return view('admin.users.index',compact('users'));
    }
    public function updateRole(Request $request ,$id){
        $user=User::find($id);
        // dd($request);
        $role = $request['role'];
        $data = [
            'role'=>$role
        ];
        $user->update($data);

        return redirect()->back();

    }
    public function add(){
        return view('admin.users.form');
    }
    public function save(Request $request){
           $request ->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required|string|max:255|min:8',
           ],
           [
            'required' => ':attribute không được để trống',
            'min' => ':attribute có độ dài ít nhất :min ký tự',
            'unique'=> ':attribute đã tồn tại'

           ],
           [
            'name'=>'Tên người dùng',
            'email'=>'Email',
            'password'=>'Mật khẩu',
           ]
        );

            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
            ];
            User::create($data);
        return redirect()->route('admin.users')->with("Thêm người dùng thành công");
    }


}
