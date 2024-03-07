<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_no',
        'student_id',
        'name',
        'grade',
        'section',
        'checked_in',
        'checked_out',
        'date_created',
    ];
    public $timestamps = false;
}
