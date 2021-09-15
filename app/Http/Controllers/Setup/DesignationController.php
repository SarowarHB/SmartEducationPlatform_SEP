<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class DesignationController extends Controller
{
    public function designationView(){
        $data=Designation::all();
        return view('backend.designation.view_designation',compact('data'));
    }

    public function designationAdd(){

        return view('backend.designation.add_designation');
    }
    public function designationStore(Request $request){
        Designation::insert([
            'designationName'=>$request->designationName,
            'created_at'=>Carbon::now()

        ]);
        $notification= array(
            'message' =>'Designation Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('designation.view')->with($notification);
    }
    public function designationEdit($id) {
        $data=Designation::find($id);
        return view('backend.designation.edit_designation',compact('data'));
    }

    public function designationUpdate(Request $request, $id) {
        Designation::find($id)->update([
            'designationName'=>$request->designationName,
            'created_at'=>Carbon::now()
        ]);

        $notification= array(
            'message' =>'Designation Update successfully',
            'alert-type'=>'success'
        );

        return Redirect()->route('designation.view')->with($notification);

    }

    public function designationDelete($id) {
        Designation::find($id)->delete();

        $notification= array(
            'message' =>'Designation Deleted successfully',
            'alert-type'=>'error'
        );

        return Redirect()->route('designation.view')->with($notification);

    }
}
