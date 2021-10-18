<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{  

    public function student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }


    public function student_year(){
    	return $this->belongsTo(StudentYear::class,'year_id','id');
    }


 public function group(){
    	return $this->belongsTo(Department::class,'department_id','id');
    }

    protected $fillable = [
        'class_id',
        'year_id',
        'department_id',
        'file',
        
    ];
    
}
