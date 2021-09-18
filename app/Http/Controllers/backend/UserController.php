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
        
        $data['datas'] = User::where('usertype','Admin')->get();
    	return view('backend.user.view_user',$data);

    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validatedData= $request->validate([

            'email'=>'required|unique:users',
            'name'=>'required'
        ]);

        $data = new User();
        $code = rand(00000,99999);
    	$data->usertype = 'Admin';
        $data->role = $request->role;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($code);
        $data->code = $code;
    	$data->save();

        $notification= array(
            'message' =>'User Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('user.view')->with($notification);
    }

    public function usersEdit($id){
        $data=User::find($id);
        return view('backend.user.edit_user',compact('data'));
    }
    
    public function usersUpdate(Request $request,$id){

        $data = User::find($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
        $data->role = $request->role;
    	$data->save();

        $notification= array(
            'message' =>'User Edited successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('user.view')->with($notification);

    }

    public function UserDelete($id){
        User::find($id)->delete();

        $notification= array(
            'message' =>'User Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('user.view')->with($notification);
    }
}
