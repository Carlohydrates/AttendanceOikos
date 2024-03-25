<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;
use App\Models\Ebackg;
use App\Models\EExperience;
use App\Models\EEducation;
use App\Models\Ereference;
use App\Models\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Manila');
        $employee_id=date('Y').rand(100,999);
        $email=$employee_id.'@employees.oikostech.ph';
        $employees=[
            'qr'=>'T'.rand(1000,9999),
            'employee_id'=>$employee_id,
            'email'=>$email,
            'fname'=>'Eric',
            'lname'=>'Andre',
            'minitial'=>'Cedric',
            'extension'=>'IV',
            'bday'=>'2001-08-20',
            'address'=>'1 Riyal Street CBE Town Quezon City',
            'phone_number'=>'09154054370',
            'telephone_number'=>'1231414',
            'age'=>24,
            'date_employed'=>date('m/d/Y'),
            'sex'=>"Male",
            'city'=>"Quezon City",
            'region'=>"NCR",
            'postal_code'=>1137,
            'country'=>'Philippines',
            'nationality'=>'Filipino',
            'position'=>'T',
            'status'=>'Inactive',
        ];
        $user_employees=[
            'email'=>$email,
            'password'=>bcrypt('2001-08-20'),
            'role'=>2,
        ];
        $info_instance=[
            'employee_id'=>$employee_id
        ];
        Employees::create($employees);
        User::create($user_employees);
        Ebackg::create($info_instance);
        EExperience::create($info_instance);
        EEducation::create($info_instance);
        Ereference::create($info_instance);
    }
}
