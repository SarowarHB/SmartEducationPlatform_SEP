<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmountCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_category_id',
        'department_id',
        'class_id',
        'amount'
        
    ];

}
