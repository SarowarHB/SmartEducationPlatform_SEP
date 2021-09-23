<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsMarks extends Model
{
    use HasFactory;

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
