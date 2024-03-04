<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevelandSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'grade_level',
        'section',
    ];
    public $timestamps = false;
}
