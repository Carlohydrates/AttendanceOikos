<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLogs;
use App\Models\StudentLogs;
use App\Models\Students;
use App\Models\Employees;

class CheckInOutController extends Controller
{
    public function checkIn($id){
        date_default_timezone_set('Asia/Manila');
        $employee_result=Employees::where('qr',$id)->first();
        $student_result=Students::where('qr',$id)->first();
        if(!empty($student_result)){
            $message=$this->handleStudentCheckEvent($student_result); 
            return response()->json([
                'success'=>true,
                'content'=>$student_result,
                'message'=>$message
            ]);      
        }
        if(!empty($employee_result)){
            $message=$this->handleEmployeeCheckEvent($employee_result);
            return response()->json([
                'success'=>true,
                'content'=>$employee_result,
                'message'=>$message
            ]);  
        }
        else{
            return response()->json(['success'=>false]);
        }
    }
    private function handleStudentCheckEvent($s_i){
        date_default_timezone_set('Asia/Manila');
        $time_cooldown=time()+5*60;
        $student_log_cooldown=StudentLogs::select('time_cooldown')
        ->where('student_id',$s_i->student_id)
        ->where('date_created',('Y-d-m'))
        ->first();
        $student_log=StudentLogs::where('student_id',$s_i->student_id)
        ->where('date_created',date('Y-d-m'))
        ->first();
        $student_log_out=StudentLogs::where('student_id',$s_i->student_id)
        ->where('date_created',date('Y-d-m'))
        ->whereNotNull('checked_out')
        ->first();
        if($student_log_out){
            return "You have already clocked out";
        }
        if($student_log){
            if(time()!=$student_log_cooldown){
                return "Please wait for 5 mins to scan once again";
            }
            StudentLogs::where('student_id',$s_i->student_id)
            ->update([
                'checked_out'=>date('H:i')
            ]);
            return ["Clocked-Out On ".date('H:i'),"Goodbye"];
        }
        StudentLogs::create([
            'student_id'=>$s_i->student_id,
            'name'=>$s_i->fname." ".$s_i->lname,
            'grade'=>$s_i->level,
            'section'=>$s_i->section,
            'checked_in'=>date('H:i'),
            'time_cooldown'=>date('H:i',$time_cooldown),
            'date_created'=>date('Y-d-m')
        ]);
        return ["Clocked-In On ".date('H:i'),"Welcome Home"];
    }
    private function handleEmployeeCheckEvent($e_i){
        date_default_timezone_set('Asia/Manila');
        $time_cooldown=time()+5*60;
        $employee_log_cooldown=EmployeeLogs::select('time_cooldown')
        ->where('student_id',$e_i->employee_id)
        ->where('date_created',('Y-d-m'))
        ->first();
        $employee_log=EmployeeLogs::where('employee_id',$e_i->employee_id)
        ->where('date_created',date('Y-d-m'))
        ->first();
        $employee_log_out=EmployeeLogs::where('employee_id',$e_i->employee_id)
        ->where('date_created',date('Y-d-m'))
        ->whereNotNull('checked_out')
        ->first(); 
        if($employee_log_out){
            return "You have already clocked out";
        }
        if($employee_log){
            if(time()!=$employee_log_cooldown){
                return "Please wait for 5 mins to scan once again";
            }
            EmployeeLogs::where('employee_id',$e_i->employee_id)
            ->update([
                'checked_out'=>date('H:i')
            ]);
            return ["Clocked-Out On ".date('H:i'),"Goodbye"];
        }
        EmployeeLogs::create([
            'employee_id'=>$e_i->employee_id,
            'name'=>$e_i->fname." ".$e_i->lname,
            'role'=>$e_i->position,
            'checked_in'=>date('H:i'),
            'time_cooldown'=>date('H:i',$time_cooldown),
            'date_created'=>date('Y-d-m')
        ]);
        return ["Clocked-In On ".date('H:i'),"Welcome Home"];
    }
}
