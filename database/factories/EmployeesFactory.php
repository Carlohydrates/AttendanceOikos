<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
use \App\Models\Employees;

class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        date_default_timezone_set('Asia/Manila');
        $date_employed=date('m/d/Y');
        return [
            //
            'qr'=>'T'.rand(1000,9999),
            'fname'=>"employee firstname",
            'email'=>"email@yahoo.com",
            'lname'=>"employee lastname",
            'minitial'=>"employee middleinitial",
            'extension'=>"number name",
            'bday'=>"08/21/2001",
            'phone_number'=>"0915544321",
            'telephone_number'=>"N/A",
            "age"=>44,
            "date_employed"=>$date_employed,
            'address'=>"420#urelostST.",
            'city'=>"Quezon City",
            'region'=>"NCR",
            'postal_code'=>124,
            'country'=>"Bangladesh",
            'nationality'=>"Filipino",
            'sex'=>"Male",
            'position'=>"Teacher",    
            'status'=>"Inactive",
        ];
    }
}
