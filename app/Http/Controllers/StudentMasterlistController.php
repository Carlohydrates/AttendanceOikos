<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentMasterlistController extends Controller
{
    public function addStudent(Request $request) {
        date_default_timezone_set('Asia/Manila');
        $date_enrolled=date('m/d/Y');
        $year=date('Y');
        Students::create([
            'qr'=>$request->input('position').rand(1000,9999),
            'student_id'=>$year.rand(1000,9999),
            'fname'=> $request->input('firstName'),
            'mname'=> $request->input('middleName'),
            'lname'=> $request->input('lastName'),
            'extension'=> $request->input('extension'),
            'level'=> $request->input('gradeLevel'),
            'section'=> $request->input('section'),
            'fetcher'=> $request->input('fetcher'),
            'enroll_status'=> $request->input('enrollStatus'),
            'bday'=> $request->input('birthday'),
            'age'=>$request->input('age'),
            'date_enrolled'=>$date_enrolled,
            'address'=> $request->input('address'),
            'city'=> $request->input('city'),
            'region'=> $request->input('region'),
            'postal_code'=> $request->input('postalCode'),
            'country'=> $request->input('country'),
            'nationality'=> $request->input('nationality'),
            'sex'=> $request->input('sex'),
            'telephone_number'=> $request->input('telephoneNumber'),
            'mobile_number'=> $request->input('mobileNumber')
        ]);
    return response()->json(['success' => true, 'message' => 'Student added successfully']);
    }

    public function retrieveData ($student_id) {
        $student = Students::where('student_id', $student_id)
                            ->get();
        return response()->json(["success"=>true,'user_data'=> $student]);
    }

    public function updateStudent (Request $request) {
        
        Students::where('student_id', $request -> input('id'))->update([
            'fname'=> $request->input('firstName'),
            'mname'=> $request->input('middleName'),
            'lname'=> $request->input('lastName'),
            'extension'=> $request->input('extension'),
            'fetcher'=> $request->input('fetcher'),
            'bday'=> $request->input('birthday'),
            'age'=>$request->input('age'),
            'address'=> $request->input('address'),
            'city'=> $request->input('city'),
            'region'=> $request->input('region'),
            'postal_code'=> $request->input('postalCode'),
            'country'=> $request->input('country'),
            'nationality'=> $request->input('nationality'),
            'sex'=> $request->input('sex'),
            'telephone_number'=> $request->input('telephoneNumber'),
            'mobile_number'=> $request->input('mobileNumber')
        ]);
        return response()->json(["success"=>true]);
    }

    public function updateStatus(Request $request)
    {
        try {
            $email = Auth::guard('users')->user()->email;
            Students::where("student_id", $request->input('id'))->update([
                "enroll_status" => $request->input('enroll_status'),
            ]);
            return response()->json(["success" => true]);
        } catch (\Exception $e) {
            \Log::error('Error updating status: ' . $e->getMessage());
            return response()->json(["success" => false, "error" => $e->getMessage()]);
        }
    }

    public function updateGradeAndSection (Request $request) {
        try {
            $email = Auth::guard('users')->user()->email;
            Students::where('student_id', $request->input('id'))->update([
                'level' => $request->input('level'),
                'section' => $request->input('section'),
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error updating grade and section: ' . $e->getMessage());

            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function deleteStudent(Request $request){
        Students::where('student_id',$request->input('id'))
        ->delete();
        return response()->json(["success"=>true]);
    }
}

