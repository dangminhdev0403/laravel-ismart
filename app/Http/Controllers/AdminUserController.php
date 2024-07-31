<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    //
    public function index(){
        //dd(Auth::user());

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

}
