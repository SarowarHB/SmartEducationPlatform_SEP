<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersCourse extends Model
{
    public function teacher(){
    	return $this->belongsTo(User::class, 'teacher_id','id');
    }
 
 public function subject(){
    	return $this->belongsTo(Subject::class, 'subject_id','id');
    }


 public function year(){
    	return $this->belongsTo(StudentYear::class, 'year_id','id');
    }
}
