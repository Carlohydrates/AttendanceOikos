<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLogs extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'name',
        'role',
        'checked_in',
        'checked_out',
        'time_cooldown',
        'date_created'
    ];
    public $timestamps=false;
}
