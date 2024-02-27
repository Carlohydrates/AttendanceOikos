<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\AAnnouncements;


use App\Models\Students;

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


    //Student navigation

    public function s_timerecord () {
        return view("student.time_record");
    }

    public function s_home () {
        return view("student.home");
    }

    public function s_userInfo () {
        return view("student.user");
    }

    public function s_calendar () {
        return view("student.calendar");
    }

    public function s_announcement () {
        return view("student.announcement");
    }

    public function s_view_announcement () {
        return view("student.view-announcement");
    }


    //Employee navigation
    public function e_userInfo(){
        return view("employees.userinfo");
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
        return view("employees.home");
    }
    public function e_time_record(){
        return view("employees.time_record");
    }

    public function e_document_request(){
        return view("employees.document_request");
    }

    public function e_approvalpage(){
        return view("employees.approval");
    }

    public function e_approval(){
        return view("employees.approval");
    }
    

    //Admin Navigation
    public function a_dashboard(){
        return view("admin.dashboard");
    }
    public function a_announcement(){
        $announcements = AAnnouncements::all(); 
        return view('admin.announcements', ['announcements' => $announcements]);
    }
    public function a_view_announcement () {
        return view("admin.view-announcement");
    }
    public function a_calendar(){
        return view("admin.calendar");
    }

    public function a_time_record(){
        return view("admin.time_record");
    }
    public function a_tr_student(){
        return view("admin.tr_student");
    }
    public function a_tr_employee(){
        return view("admin.tr_employee");
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
