<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function DepartmentView(){
        $data=Department::all();
        return view('backend.department.view_department',compact('data'));
    }


    public function DepartmentAdd(){
        return view('backend.department.add_department');
    }


    public function DepartmentStore(Request $request){
        Department::insert([
            'departmentName'=>$request->departmentName,
            'created_at'=>Carbon::now()
        ]);

        $notification= array(
            'message' =>'Department Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('department.view')->with($notification);
    }

    public function DepartmentEdit($id){

        $data=Department::find($id);
        return view('backend.department.edit_department',compact('data'));
    }

    public function DepartmentUpdate(Request $request, $id){

        Department::find($id)->update([

            'departmentName'=>$request->departmentName,
            'created_at'=>Carbon::now()

        ]);

        $notification= array(
            'message' =>'Department Updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('department.view')->with($notification);
    }

    public function DepartmentDelete($id){
        Department::find($id)->delete();

        $notification= array(
            'message' =>'Department Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('department.view')->with($notification);
    }
    
}
