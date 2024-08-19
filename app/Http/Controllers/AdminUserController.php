<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    //
    private function calculateCounts()
       {
        $countActive = User::all()->count();
        $countTrash = User::onlyTrashed()->count();
           return compact('countActive', 'countTrash');
       }
    public function index(Request $request){

        $count = $this->calculateCounts() ;
        //dd(Auth::user());
       $status = $request->status;

        if($status == 'trash'){
            $users = User::where('id','!=',Auth::user()->id)->onlyTrashed()->orderBy('created_at','desc')->paginate(10);
             foreach($users as $user){
            $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
            $count = $this->calculateCounts() ;

            $keyword = $request->keyword ;
            if($keyword){
                $users = User::where('name','like','%'.$keyword.'%')->where('id','!=',Auth::user()->id)->orderBy('created_at','desc')->onlyTrashed()->paginate(10);
                foreach($users as $user){
                    $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
                   }
                }

           }
           return view('admin.users.index',compact('users','status','count'));

        }else{
            $keyword = $request->keyword ;
            // dd($keyword);
            if($keyword){
                $users = User::where('name','like','%'.$keyword.'%')->where('id','!=',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
                foreach($users as $user){
                    $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
                   }
                //    dd($users->total());
                   return view('admin.users.index',compact('users','count'));
            }
            $users = User::where('id','!=',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
            foreach($users as $user){
                $user->formatted_date = Carbon::parse($user->created_at)->format('d-m-Y ');
               }
               return view('admin.users.index',compact('users','status','count'));
        };






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
        return redirect()->route('admin.users')->with('message',"Thêm người dùng thành công");
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.form',compact('user'));
    }
    public function update(Request $request,$id){

        $user = User::find($id);
        $request ->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',   Rule::unique('users')->ignore($user->id),],
            'password' => 'nullable|string|max:255|min:8',
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
            'role'=>$request->role,
        ];
        if($request->filled('password') ){
           $data['password'] = Hash::make($request->password) ;

        }
        $user->update($data);
        return redirect()->route('admin.users')->with('message',"Cập nhật người dùng thành công");
    }

    public function action(Request $request){
       //  dd($request['list-check-hidden']);
        $list_check = $request['list-check-hidden'];
        if(!empty( $list_check)){
            $act = $request['act'] ;
          //  dd($act);
            if($act =='delete'){
                    foreach($list_check as $id){
                        $record = User::find($id);
                        $record->delete();
                    }
                    return redirect()->back()->with('message','Vô hiệu hóa thành công');
            }if($act =='forceDelete'){
                foreach($list_check as $id){
                    $record = User::withTrashed()->find($id);
                    $record->forceDelete();
                }
                return redirect()->back()->with('message','Đã xóa vĩnh viễn');
            }if($act =='restore'){
                foreach($list_check as $id){
                    $record = User::onlyTrashed()->find($id);
                    $record->restore();
                }
                return redirect()->back()->with('message','Khôi phục thành công');
            }
            else{
                return redirect()->back()->with('error','Bạn chưa chọn thao tác');
            }
        }else{
            return redirect()->back()->with('error','Bạn chưa chọn người dùng ');
        }

    }

    public function delete($id){
        $record = User::find($id);
        $record->delete();
        return redirect()->back()->with('message','Vô hiệu hóa thành công');
    }
    public function restore($id){

       User::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('message','Khôi phục thành công');
    }

}
