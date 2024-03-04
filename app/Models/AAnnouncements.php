<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AAnnouncements extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject',
        'content',
        'viewpagesender', 
    ];

    protected $table = 'a_announcements';
}