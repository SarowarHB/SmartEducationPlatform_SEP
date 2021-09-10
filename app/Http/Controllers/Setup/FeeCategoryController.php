<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FeeCategoryController extends Controller
{
    public function FeeView(){
        $data = FeeCategory::all();

        return view('backend.feeCategory.view_fee',compact('data'));
    }

    public function FeeAdd(){
        return view('backend.feeCategory.add_fee');
    }

    public function FeeStore(Request $request){
        FeeCategory::insert([
            'feeName'=>$request->feeName,
            'created_at'=>Carbon::now()
        ]);

        $notification= array(
            'message' =>'FeeCategory Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('fee.view')->with($notification);
    }

    public function FeeEdit($id){

        $data=FeeCategory::find($id);
        return view('backend.feeCategory.edit_fee',compact('data'));

    }

    public function FeeUpdate(Request $request, $id){

        FeeCategory::find($id)->update([

            'feeName' =>$request->feeName,
            'created_at'=>Carbon::now()

        ]);

        $notification= array(
            'message' =>'FeeCategory Updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('fee.view')->with($notification);

    }

    public function FeeDelete($id){

        FeeCategory::find($id)->delete();

        $notification= array(
            'message' =>'FeeCategory Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('fee.view')->with($notification);
    }
}
