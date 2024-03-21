<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ereference extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_one',
        'company_one',
        'contact_one',
        'relation_one',
        'position_one',

        'name_two',
        'company_two',
        'contact_two',
        'relation_two',
        'position_two',

        'name_three',
        'company_three',
        'contact_three',
        'relation_three',
        'position_three',
    ];
    public $timestamps = false;
}
