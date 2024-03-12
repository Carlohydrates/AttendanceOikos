<?php

namespace App\Http\Controllers;

use App\Models\DocuRequest;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DocuRequestController extends Controller
{
    public function addDocuRequest(Request $request) {
        $employee_name=Employees::select('fname','minitial','lname')->where('employee_id',Auth::guard('users')->user()->id)->first();

        date_default_timezone_set('Asia/Manila');
        $date_requested = date('m/d/Y');
        $year=date('Y');
        $request_code = $request->input('request_type') . date('Y-md') . rand(100,999);
        DocuRequest::create([
            'employee_id'=>Auth::guard('users')->user()->id,
            'requestor_name'=>$employee_name->lname . ", " . $employee_name->fname . " " . $employee_name->minitial,
            'request_code'=>$request_code,
            'request_type'=>DocuRequest::codeType($request->input('request_type')),
            'date_requested'=>$date_requested,
            'request_status'=>'Pending',
            'reason'=>$request->input('reason')
        ]);
        return response()->json(['success' => true, 'message' => 'Document Request added successfully']);
    }

    public function retrieveDocuData ($docu_id) {
        $docudata = DocuRequest::where('id', $docu_id)
                            ->get();
        return response()->json(["success"=>true,'user_data'=> $docudata]);
    }

    public function rejectDocuRequest(Request $request, $id) {
        date_default_timezone_set('Asia/Manila');
        $dateProcessed=date('m/d/Y');

        DocuRequest::where('id', $id)->update([
            'date_processed'=>$dateProcessed,
            'request_status'=>'Rejected',
            'remarks'=>$request->input('remarks'),
        ]);
        
        return response()->json(['success' => True], 200);
    }

    public function store(Request $request, $id) {
        
        // Store the file in storage\app\public folder
        date_default_timezone_set('Asia/Manila');

        if ($request->hasFile('file')) {
            $dateProcessed=date('m/d/Y');
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = 'uploads/'.$fileName;
            $file->move('uploads/', $fileName);
        
            // Store file information in the database
            DocuRequest::where('id', $id)->update([
                'filename'=>$fileName,
                'file_path'=>$filePath,
                'date_processed'=>$dateProcessed,
                'request_status'=>'Approved',
                'remarks'=>$request->input('remarks')
            ]);

            return response()->json(['success' => True], 200);
        } 

        return response()->json(['fail' => False], 500);
    }
}