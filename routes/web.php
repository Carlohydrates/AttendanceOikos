<?php

use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentMasterlistController;
use App\Http\Controllers\EmployeeMasterListController;

use App\Http\Controllers\AAnnouncementsController;
use App\Http\Controllers\CalendarController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routes for main account
Route::get('/', [Pages::class,'login']);
Route::post('/login-user',[LoginController::class,'login']);


Route::get('/forgot',[Pages::class,'forgotpassword']);
Route::get('/reset',[Pages::class,'resetpassword']); 

//login pages
Route::post('/check-email',[ForgotPassword::class,'submit']);
Route::post('/submit-code',[ForgotPassword::class,'verifyCode']);

//Routes for admins
Route::get('/admin/Dashboard',[Pages::class,'a_dashboard']);
Route::get('/admin/Announcement',[AAnnouncementsController::class,'a_announcement']);
Route::get('/admin/Announcement/View/', [AAnnouncementsController::class, 'a_view_announcement']);
Route::get('/admin/Document_Request',[Pages::class,'a_Document_Request']);
Route::get('/admin/Calendar',[Pages::class,'a_calendar']);
Route::get('/admin/Time_Record',[Pages::class,'a_time_record']);
Route::get('/admin/Privileges',[Pages::class,'a_Privileges']);
Route::get('/admin/logout',[LoginController::class,'logoutAdmin']);
Route::get('/admin/Student_Masterlist',[Pages::class,'a_smasterlist']);
Route::get('/admin/Employee_Masterlist',[Pages::class,'a_emasterlist']);
Route::get('/admin/Time_Record/Student',[Pages::class,'a_tr_student']);
Route::get('/admin/Time_Record/Employee',[Pages::class,'a_tr_employee']);
Route::get('/admin/Time_Record/DepEd',[Pages::class,'a_tr_deped']);

Route::post('/add-student', [StudentMasterlistController::class, 'addStudent']);
Route::post('/add-employee',[EmployeeMasterListController::class,'create']);

Route::post('/admin/Announcement/Add', [AAnnouncementsController::class, 'addAnnouncement']);


Route::post('/retrieve-employee',[EmployeeMasterListController::class,'show']);
Route::post('/update-employee',[EmployeeMasterListController::class,'update']);
Route::post('/status_update-employee',[EmployeeMasterListController::class,'status']);
Route::post('/role_update-employee',[EmployeeMasterListController::class,'role']);
Route::post('/delete-employee',[EmployeeMasterListController::class,'delete']);

Route::post('/add-event',[CalendarController::class,'create']);
Route::post('/delete-event',[CalendarController::class,'delete']);
Route::post('/update-event',[CalendarController::class,'update']);
Route::get('/retrieve-calendar-date/{date}',[CalendarController::class,'retrieve']);

    

Route::get('/reset', [Pages::class,'resetpassword']);

//Routes for students
Route::get('/students/Home', [Pages::class,'s_home']);
Route::get('/students/Calendar', [Pages::class,'s_calendar']);
Route::get('/students/Announcement', [Pages::class,'s_announcement']);
Route::get('/students/User-Info', [Pages::class,'s_userInfo']);
Route::get('/students/Time-Logs', [Pages::class,'s_timerecord']);
Route::get('/students/Announcement/View', [Pages::class,'s_view_announcement']);
Route::get('/students/logout',[LoginController::class,'logoutStudent']);

//Routes for employees
Route::get('/employees/User-Info',[Pages::class,'e_userInfo']);
Route::get('/employees/Announcement',[Pages::class,'e_announcement']);
Route::get('/employees/Calendar',[Pages::class,'e_calendar']);
Route::get('/employees/Document-Request',[Pages::class,'e_document_request']);
Route::get('/employees/Document-Request/Approval',[Pages::class,'e_approvalpage']);
Route::get('/employees/Time-Record',[Pages::class,'e_time_record']);
Route::get('/employees/Home',[Pages::class,'e_home']);
Route::get('/employees/Document-Request/Approval',[Pages::class,'e_approval']);
Route::get('/employees/Announcement/View', [Pages::class,'e_view_announcement']);
Route::get('/employees/logout',[LoginController::class,'logoutEmployee']);

