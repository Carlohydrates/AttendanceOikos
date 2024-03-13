<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Manila');
        $students=[
            'student_id'=>date('Y').rand(1000,9999),
            'email'=>date('Y').rand(1000,9999).'@oikostech.edu.ph',
            'qr'=>rand(1000,9999),
            'fname'=>'Adrian',
            'lname'=>'Xavier',
            'mname'=>'Fantador',
            'extension'=>'III',
            'fetcher'=>'Tony Soprano',
            'level'=>1,
            'section'=>'Ruby',
            'enroll_status'=>'Pending',
            'bday'=>'2019-20-08',
            'age'=>6,
            'date_enrolled'=>date('Y-d-m'),
            'address'=>'bldg 40 veterans village pasong tamo Quezon City',
            'city'=>'Quezon City',
            'region'=>'NCR',
            'postal_code'=>1137,
            'country'=>'Philippines',
            'nationality'=>'Filipino',
            'sex'=>'Male',
            'telephone_number'=>'3312341',
            'mobile_number'=>'0912131421',
        ];
        Students::create($students);
    }
}
