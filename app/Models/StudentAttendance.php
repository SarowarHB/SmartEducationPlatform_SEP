<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public function student(){
    	return $this->belongsTo(User::class, 'student_id','id');
    }
 
 public function assign_subject(){
    	return $this->belongsTo(Subject::class, 'subject_id','id');
    }


 public function year(){
    	return $this->belongsTo(StudentYear::class, 'year_id','id');
    }


    protected $fillable = [
        'student_id',
        'date',
        'attend_status',
        'year_id',
        'subject_id',
        
    ];
   
}
