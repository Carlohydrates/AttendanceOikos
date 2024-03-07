<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_no',
        'employee_id',
        'name',
        'role',
        'checked_in',
        'checked_out',
        'date_created',
    ];
    public $timestamps = false;
}
