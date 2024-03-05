<?php

namespace App\Http\Controllers;

use App\Models\GradeLevelandSection;
use Illuminate\Http\Request;

class GradeLevelandSectionController extends Controller
{
    public function addGradeAndSection (Request $request) {
        GradeLevelandSection::create([
            'grade_level'=>$request->input('gradeLevel'),
            'section'=>$request->input('section')
        ]);
    return response()->json(['success' => true, 'message' => 'Grade added successfully']);
    }

    public function getGradeLevels()
    {
    $gradeLevels = GradeLevelandSection::select('grade_level')
                                        ->distinct()
                                        ->orderBy('grade_level')
                                        ->get();

    return response()->json(['grade_level'=> $gradeLevels]);
    }

    public function getSections($gradeLevel)
    {
        $sections = GradeLevelandSection::select('section')->where('grade_level',$gradeLevel)->get();
    
        return response()->json(['section'=> $sections]);
    }

    public function removeGradeSection(Request $request)
    {
        $gradeLevel = $request->input('gradeLevel');
        $section = $request->input('section');

        $deleted = GradeLevelandSection::where('grade_level', $gradeLevel)
            ->where('section', $section)
            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Grade level and section removed successfully']);
        } else {
            return response()->json(['error' => 'Failed to remove grade level and section'], 500);
        }
    }
}







