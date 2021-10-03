<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsMarks extends Model
{
    
    public function exam_type(){
    	return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }

    public function student(){
    	return $this->belongsTo(User::class, 'student_id','id');
    }
 
 public function assign_subject(){
    	return $this->belongsTo(Subject::class, 'assign_subject_id','id');
    }


 public function year(){
    	return $this->belongsTo(StudentYear::class, 'year_id','id');
    }

 public function student_class(){
    	return $this->belongsTo(StudentClass::class, 'class_id','id');
    }

 

    protected $fillable = [
        'student_id',
        'year_id',
        'class_id',
        'department_id',
        'assign_subject_id',
        'exam_type_id',
        'marks',
        
    ];
}
