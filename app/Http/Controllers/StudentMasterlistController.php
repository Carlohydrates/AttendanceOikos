<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use App\Models\Students;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\IOFactory;
class StudentMasterlistController extends Controller
{
    public function addStudent(Request $request) {
        date_default_timezone_set('Asia/Manila');
        $date_enrolled=date('m/d/Y');
        $year=date('Y');
        $student_id = $year . rand(1000, 9999);
        $email = $student_id . "@oikostech.edu.ph";
        $password = $request->input('birthday');
        Students::create([
            'qr'=>$request->input('position').rand(1000,9999),
            'student_id'=>$student_id,
            'email'=>$email,
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
        User::create([
            'id'=>$student_id,
            'email'=>$email,
            'password'=>bcrypt($password),
            'role'=>3
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
        User::where('id', $request->input('id'))
        ->delete();

        return response()->json(["success"=>true]);
    }

    public function uploadMultipleStudents (Request $request) {
        date_default_timezone_set('Asia/Manila');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = 'uploads/'.$fileName;
            $file->move('uploads/', $fileName);

            if ($file->getClientOriginalExtension() == '.csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else if ($file->getClientOriginalExtension() == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($filePath);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                $date_enrolled=date('m/d/Y');
                $year=date('Y');
                $student_id = $year . rand(1000, 9999);
                $email = $student_id . "@oikostech.edu.ph";
                $password = $request->input('birthday');

                Students::create([
                    'qr'=>rand(1000,9999),
                    'student_id'=>$student_id,
                    'email'=>$email,
                    'fname'=> $sheetData[$i][1],
                    'mname'=> $sheetData[$i][3],
                    'lname'=> $sheetData[$i][2],
                    'extension'=> $sheetData[$i][4],
                    'level'=> $sheetData[$i][6],
                    'section'=> $sheetData[$i][7],
                    'fetcher'=> $sheetData[$i][5],
                    'enroll_status'=> $sheetData[$i][8],
                    'bday'=> $sheetData[$i][9],
                    'age'=>$sheetData[$i][10],
                    'date_enrolled'=>$date_enrolled,
                    'address'=> $sheetData[$i][11],
                    'city'=> $sheetData[$i][12],
                    'region'=> $sheetData[$i][13],
                    'postal_code'=> $sheetData[$i][14],
                    'country'=> $sheetData[$i][15],
                    'nationality'=> $sheetData[$i][16],
                    'sex'=> $sheetData[$i][17],
                    'telephone_number'=> $sheetData[$i][18],
                    'mobile_number'=> $sheetData[$i][19]
                ]);
                User::create([
                    'id'=>$student_id,
                    'email'=>$email,
                    'password'=>bcrypt($password),
                    'role'=>3
                ]);
            }
        }
    }
}

