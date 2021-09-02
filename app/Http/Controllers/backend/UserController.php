<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class UserController extends Controller
{
    public function UserView(){
        $datas=User::all();
        return view('backend.user.view_user',compact('datas'));

    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validatedData= $request->validate([

            'email'=>'required|unique:users',
            'name'=>'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'usertype'=>$request->usertype,
            'created_at'=>Carbon::now()
        ]);

        $notification= array(
            'message' =>'User Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('user.view')->with($notification);
    }
    //
}
