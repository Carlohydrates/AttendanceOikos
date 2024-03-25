<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;
use App\Models\Sbackg;
use App\Models\User;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Manila');
        $student_id=date('Y').rand(1000,9999);
        $email=$student_id.'@oikostech.edu.ph';
        $students=[
            'student_id'=>$student_id,
            'email'=>$email,
            'qr'=>rand(1000,9999),
            'fname'=>'Adrian',
            'lname'=>'Xavier',
            'mname'=>'Fantador',
            'extension'=>'III',
            'fetcher'=>'Tony Soprano',
            'level'=>1,
            'section'=>'Ruby',
            'enroll_status'=>'Pending',
            'bday'=>'2019-08-20',
            'age'=>6,
            'date_enrolled'=>date('m/d/Y'),
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
        $user_students=[
            'email'=>$email,
            'password'=>bcrypt('2019-08-20'),
            'role'=>3
        ];
        Students::create($students);
        User::create($user_students);
        Sbackg::create([
            'student_id'=>$student_id
        ]);
    }
}
