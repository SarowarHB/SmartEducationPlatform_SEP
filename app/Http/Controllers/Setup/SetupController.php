<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class SetupController extends Controller
{
    public function ClassView(){
        $data=StudentClass::all();
        return view('backend.class.view_class',compact('data'));
    }
    public function ClassAdd(){
        return view('backend.class.add_class');
    }

    public function ClassStore(Request $request){
        StudentClass::insert([
            'className' =>$request->className,
            'created_at'=>Carbon::now()

        ]);
        
        $notification= array(
            'message' =>'Class Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('class.view')->with($notification);


    }

    public function ClassEdit($id) {
        $data=StudentClass::find($id);
        return view('backend.class.class_edit',compact('data'));

    }

    public function ClassUpdate(Request $request, $id) {
        StudentClass::find($id)->update([
            'className' =>$request->className,
            'created_at'=>Carbon::now()

        ]);
        
        $notification= array(
            'message' =>'Class updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('class.view')->with($notification);
    }

    public function ClassDelete($id){
        StudentClass::find($id)->delete();

        $notification= array(
            'message' =>'Class Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('class.view')->with($notification);

    }
}
