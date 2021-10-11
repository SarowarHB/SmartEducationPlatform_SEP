<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
    }

     

    public function student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }


    public function student_year(){
    	return $this->belongsTo(StudentYear::class,'year_id','id');
    }


 public function group(){
    	return $this->belongsTo(Department::class,'department_id','id');
    }

    public function subject(){
    	return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function feeCategory(){
    	return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

}
