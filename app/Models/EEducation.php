<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EEducation extends Model
{
    use HasFactory;
    protected $fillable=[
            'employee_id',
            //Gradeschol
            'gs_school',
            'gs_address',
            'gs_year',
            'gs_contact_person',
            'gs_phone_number',
            //Highschool
            'hs_school',
            'hs_address',
            'hs_year',
            'hs_contact_person',
            'hs_phone_number',
            //College
            'c_school',
            'c_address',
            'c_year',
            'c_contact_person',
            'c_phone_number',

    ];
   public $timestamps = false;
   protected $table = 'e_educations';
}
