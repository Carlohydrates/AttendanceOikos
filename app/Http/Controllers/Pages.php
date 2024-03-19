<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use App\Models\Students;
use App\Models\StudentLogs;
use App\Models\Calendar;
use App\Models\DocuRequest;
use App\Models\EmployeeLogs;



class Pages extends Controller
{
    public function forgotpassword () {
        return view("forgot");
    }

    public function login () {
        return view("login");
    }

    public function resetpassword () {
        return view("reset_password");
    }

    public function scanner(){
        return view("qr");
    }
    //Student navigation

    public function s_timerecord () {
        return view("student.time_record");
    }

    public function s_home () {
        $email = Auth::guard('users')->user()->email;
        $student_data = Students::where('email', $email)->get();
        return view("student.home", ['student_info'=>$student_data]);
    }

    public function s_userInfo () {
        $email = Auth::guard('users')->user()->email;
        $student_data = Students::where('email', $email)->get();
        return view("student.user", ['student_data'=>$student_data]);
    }

    public function s_calendar () {
        $email = Auth::guard('users')->user()->email;
        $schedules = Calendar::where('email', $email)->get();
        return view("student.calendar", ['schedules'=>$schedules]);
    }

    public function s_announcement () {
        return view("student.announcement");
    }

    public function s_view_announcement () {
        return view("student.view-announcement");
    }

    
    //Employee navigation
    public function e_userInfo(){
        $email = Auth::guard('users')->user()->email;
        $employee_data = Employees::where('email', $email)->get();
        return view("employees.userinfo", ['employee_data'=>$employee_data]);
    }
    
    public function e_announcement(){
        return view("employees.announcement");
    }
    public function e_view_announcement () {
        return view("employees.view-announcement");
    }
    public function e_calendar(){
        return view("employees.calendar");
    }
    public function e_home(){
        $email = Auth::guard('users')->user()->email;
        $employee_data = Employees::where('email', $email)->get();
        return view("employees.home", ['employee_info'=>$employee_data]);
    }
    public function e_time_record(){
        $employee_id = Auth::guard('users')->user()->id;
        $employee_data = EmployeeLogs::where('employee_id', $employee_id)->get();
        return view("employees.time_record", ['employee_logs'=>$employee_data]);
    }

    public function e_document_request(){
        return view("employees.document_request");
    }

    public function e_approvalpage($id){
        $document = DocuRequest::where('id', $id)
        ->get();
        return view("employees.approval", ['document'=>$document]);
    }
    //Admin Navigation
    public function a_dashboard(){
        date_default_timezone_set('Asia/Manila');
        $employee_logs=EmployeeLogs::where('date_created',date('Y-d-m'))->get();
        $employee_count=Employees::all();
        $document_count=DocuRequest::all();
        $pending_docu=DocuRequest::where('request_status', 'Pending')->get();
        $student_count=Students::all();
        $pending_students=Students::where('enroll_status','Pending')->get();
        $calendar=Calendar::where('email',Auth::guard('users')->user()->email)->get();
        return view("admin.dashboard",[
            "employee"=>count($employee_count),
            "pending_docu"=>count($pending_docu),
            "docu_request"=>count($document_count),
            "students"=>count($student_count),
            "pending_students"=>count($pending_students),
            "employee_logs"=>$employee_logs,
            "calendar"=>$calendar
        ]);
    }
    public function a_announcement(){
        $announcements = AAnnouncements::all(); 
        return view('admin.announcements', ['announcements' => $announcements]);
    }
    public function a_view_announcement () {
        return view("admin.view-announcement");
    }
    public function a_calendar(){
        $user_email=Auth::guard('users')->user()->email;
        $calendar=Calendar::where('email',$user_email)->get();
        return view("admin.calendar",['schedules'=>$calendar]);
    }

    public function a_time_record(){
        return view("admin.time_record");
    }
    public function a_tr_student(){
        $Student_logs = StudentLogs::get();
        return view("admin.tr_student", ["Student_logs"=> $Student_logs]);
    }
    public function a_tr_employee(){
        $Employee_logs = EmployeeLogs::get();
        return view("admin.tr_employee", ["Employee_logs"=> $Employee_logs]);
    }
    public function a_tr_deped(){
        return view("admin.tr_deped");
    }
    public function a_privileges(){
        return view("admin.privileges");
    }
    public function a_document_request(){
        return view("admin.document_request");
    }
    public function a_smasterlist(){
        $Students = Students::get();
        return view("admin.student_masterlist", ["Students"=> $Students]);
    }
    public function a_emasterlist(){ 
        $employees = Employees::where("position", "!=", "Admin")->get();
        return view("admin.employee_masterlist", ["employees"=>$employees]);
    }
}