<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EExperience extends Model
{
    use HasFactory;
    protected $fillable=[
         'employee_id',
        //1st
         'company',
         'company_address',
         'company_jobtitle_position',
         'company_contact',
         'company_job_description',
         'company_duration',
         'company_phone_number',
         //2nd
         'company2',
         'company2_address',
         'company2_jobtitle_position',
         'company2_contact',
         'company2_job_description',
         'company2_duration',
         'company2_phone_number',
         //3rd
         'company3',
         'company3_address',
         'company3_jobtitle_position',
         'company3_contact',
         'company3_job_description',
         'company3_duration',
         'company3_phone_number',
    ];
    public $timestamps=false;
    protected $table = 'e_experiences';
}
