<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GradeLevelandSection;
class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $grade_sections=[
            [
                'grade_level'=>1,
                'section'=>'ruby',
            ],
            [
                'grade_level'=>2,
                'section'=>'humility',
            ],
            [
                'grade_level'=>3,
                'section'=>'lapu-lapu',
            ],
            [
                'grade_level'=>4,
                'section'=>'dandelion',
            ],
            [
                'grade_level'=>5,
                'section'=>'temperance',
            ],
        ];
        foreach($grade_sections as $grade_section){
            GradeLevelandSection::create($grade_section);
        }
    }
}
