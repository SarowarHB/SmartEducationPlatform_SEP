<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class StudentYearController extends Controller
{
    public function YearView(){
        $data=StudentYear::all();
        return view('backend.year.view_year',compact('data'));
    }

    public function YearAdd(){
        return view('backend.year.add_year');
    }
    public function YearStore(Request $request){
        StudentYear::insert([
            'yearName' =>$request->yearName,
            'year'=>$request->year,
            'created_at'=>Carbon::now()

        ]);
        $notification= array(
            'message' =>'Year Inserted successfully',
            'alert-type'=>'success'
        );
       
       
        return redirect()->route('year.view')->with($notification);
    }

    public function YearEdit($id){
        $data=StudentYear::find($id);
        return view('backend.year.year_edit',compact('data'));
    }

    public function YearUpdate(Request $request, $id){
        StudentYear::find($id)->update([
            'yearName' =>$request->yearName,
            'year'=>$request->year,
            'created_at'=>Carbon::now()

        ]);

        $notification= array(
            'message' =>'Year Updated successfully',
            'alert-type'=>'success'
        );
       
       
        return redirect()->route('year.view')->with($notification);
    }

    public function YearDelete($id) {
        StudentYear::find($id)->delete();

        $notification= array(
            'message' =>'Year Inserted successfully',
            'alert-type'=>'error'
        );
       
       
        return redirect()->route('year.view')->with($notification);
    }
}
