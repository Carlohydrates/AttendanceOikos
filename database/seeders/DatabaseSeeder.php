<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;
use App\Models\EBackg;
use App\Models\EEducation;
use App\Models\EExperience;
use App\Models\Students;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Employees::factory()->create();
        EBackg::factory()->create();
        EExperience::factory()->create();
        EEducation::factory()->create();

        $this->call([
            UserSeeder::class,
            EmployeeSeeder::class,
            StudentSeeder::class,
            GradeLevelSeeder::class,
        ]);
    }
}
