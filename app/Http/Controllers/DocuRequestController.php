<?php

namespace App\Http\Controllers;

use App\Models\DocuRequest;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Http\Request;
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
        return response()->json(["success"=>true,'user_data'=> $docu_id]);
    }
}
