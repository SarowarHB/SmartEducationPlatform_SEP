<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class ProfileController extends Controller
{
    //View profile
    public function ProfileView(){
        $id=Auth::user()->id;
        $data=User::find($id);

        return view('backend.profile.view_profile',compact('data'));
    }

    //edit profile
    public function ProfileEdit(){
        $id=Auth::user()->id;
        $data=User::find($id);

        return view('backend.profile.edit_profile',compact('data'));
    }

    //Store profile Data
    public function ProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);

        $data->name=$request->name;
        $data->email=$request->email;
        $data->usertype=$request->usertype;
        $data->gender=$request->gender;
        $data->mobile=$request->mobile;
        $data->address=$request->address;

        if($request->file('image')){
            $file=$request->file('image');

            if(Auth::user()->role=='Student'){

                @unlink(public_path('upload/student_images/'.$data->image));
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $data['image']=$filename;
          
            }
            else
            {
                @unlink(public_path('upload/user_images/'.$data->image));
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $data['image']=$filename;

            }
           
            
        }
        $data->save();

        $notification= array(
            'message' =>'Profile Updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('profile.view')->with($notification);


    }

    //View password Update option
    public function ViewPassword(){
        return view('backend.profile.view_pass');
    }

    //Update Password
    public function UpdatePassword(Request $request){
        $validatedData= $request->validate([

            'oldpassword'=>'required',
            'password'=>'required|confirmed',
            
            
        ]);

        $hasPassword= Auth::user()->password;
        if(Hash::check($request->oldpassword,$hasPassword)){
            $id=Auth::user()->id;
            User::find($id)->update([
                'password'=>bcrypt($request->password),
                'created_at'=>Carbon::now()

            ]);
            Auth::logout();
            return Redirect()->route('login');    
        }
        else{
            return Redirect()->back();
        }
    }
}

