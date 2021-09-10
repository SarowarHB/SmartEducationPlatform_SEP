<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\Department;
use App\Models\FeeAmountCategory;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FeeAmountController extends Controller
{
    public function FeeAmountView(){
        $data=FeeAmountCategory::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.feeAmount.view_feeAmount',compact('data'));
    }
    public function FeeAmountAdd(){
        $category=FeeCategory::all();
        $class=StudentClass::all();
        $department=Department::all();

        return view('backend.feeAmount.add_feeAmount',compact('category','class','department'));
    }

    public function FeeAmountStore(Request $request){

        $counter=count($request->class_id);

        if($counter !=NULL){

            for($i=0;$i<$counter;$i++){

                $feeAmount = new FeeAmountCategory();

                $feeAmount->fee_category_id= $request->fee_category_id;
                $feeAmount->department_id=$request->department_id[$i];
                $feeAmount->class_id=$request->class_id[$i];
                $feeAmount->amount=$request->amount[$i];
                $feeAmount->save();


            }
        }

        $notification= array(
            'message' =>'Fee Amount Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($fee_category_id){

        $categoryAmount=FeeAmountCategory::where('fee_category_id',$fee_category_id)->
        orderBy('class_id','asc')->get();

        $category=FeeCategory::all();
        $class=StudentClass::all();
        $department=Department::all();

        return view('backend.feeAmount.add_feeAmount',compact('category','class','department','categoryAmount'));


    }
}
