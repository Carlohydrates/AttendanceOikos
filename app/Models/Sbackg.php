<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sbackg extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'parent_name',
        'mobile_number',
        'telephone_number',
    ];
    public $timestamps=false;
}
