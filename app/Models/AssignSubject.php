<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function student_department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
 
  public function school_subject(){
      
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
