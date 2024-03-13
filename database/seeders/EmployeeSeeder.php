<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Manila');
        $employees=[
            'qr'=>'T'.rand(1000,9999),
            'employee_id'=>date('Y').rand(100,999),
            'email'=>date('Y').rand(100,999).'@employees.oikostech.ph',
            'fname'=>'Eric',
            'lname'=>'Andre',
            'minitial'=>'Cedric',
            'extension'=>'IV',
            'bday'=>'2001-20-08',
            'address'=>'1 Riyal Street CBE Town Quezon City',
            'phone_number'=>'09154054370',
            'telephone_number'=>'1231414',
            'age'=>24,
            'date_employed'=>date('Y-d-m'),
            'sex'=>"Male",
            'city'=>"Quezon City",
            'region'=>"NCR",
            'postal_code'=>1137,
            'country'=>'Philippines',
            'nationality'=>'Filipino',
            'position'=>'T',
            'status'=>'Inactive',
        ];
        Employees::create($employees);
    }
}
