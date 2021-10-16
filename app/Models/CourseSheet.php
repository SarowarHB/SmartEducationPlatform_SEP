<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'year',
        'lecture_name',
        'year_id',
        'subject_id',
        'file'
        
    ];
    
}
