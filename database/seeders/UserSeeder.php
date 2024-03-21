<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
            Roles:
            1->Admin
            2->Employee
            3->Students
        */
        $users=[
            [
                'email'=>'kafelnikovdelarosa@yahoo.com',
                'password'=>bcrypt('peanus22'),
                'role'=>1
            ], 
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
