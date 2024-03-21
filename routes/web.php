<?php

use App\Http\Controllers\DocuRequestController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\GradeLevelandSectionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentMasterlistController;
use App\Http\Controllers\EmployeeMasterListController;
use App\Http\Controllers\CheckInOutController;
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
Route::get('/admin/Announcement/View/{id}', [AAnnouncementsController::class, 'a_view_announcement']);
Route::get('/admin/Document_Request',[Pages::class,'a_Document_Request']);
Route::get('/retrieve-docu-data/{id}', [DocuRequestController::class, 'retrieveDocuData']);
Route::post('/upload-store/{id}', [DocuRequestController::class, 'store']);
Route::post('/reject-docureq/{id}', [DocuRequestController::class, 'rejectDocuRequest']);
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
Route::get('/retrieve-student/{student_id}', [StudentMasterlistController::class, 'retrieveData']);
Route::get('/upload-multiple-students', [StudentMasterlistController::class, 'uploadMultipleStudents']);
Route::post('/update-student', [StudentMasterlistController::class, 'updateStudent']);
Route::post('/status-update-student', [StudentMasterlistController::class, 'updateStatus']);
Route::post('/grade-update-student', [StudentMasterlistController::class, 'updateGradeAndSection']);
Route::post('/delete-student', [StudentMasterlistController::class, 'deleteStudent']);
Route::post('/add-grade-section', [GradeLevelandSectionController::class, 'addGradeAndSection']);
Route::get('/get-grade-levels', [GradeLevelandSectionController::class, 'getGradeLevels']);
Route::get('/get-sections/{gradeLevel}', [GradeLevelandSectionController::class, 'getSections']);
Route::post('/remove-grade-section', [GradeLevelandSectionController::class, 'removeGradeSection']);
Route::post('/add-employee',[EmployeeMasterListController::class,'create']);

Route::post('/admin/Announcement/Add', [AAnnouncementsController::class, 'addAnnouncement']);


Route::post('/retrieve-employee',[EmployeeMasterListController::class,'show']);
Route::get('/retrieve-employeename/{employee_id}',[EmployeeMasterlistController::class,'retrieveData']);
Route::post('/update-employee',[EmployeeMasterListController::class,'update']);
Route::post('/status_update-employee',[EmployeeMasterListController::class,'status']);
Route::post('/role_update-employee',[EmployeeMasterListController::class,'role']);
Route::post('/delete-employee',[EmployeeMasterListController::class,'delete']);

Route::post('/add-event',[CalendarController::class,'create']);
Route::post('/delete-event/{id}',[CalendarController::class,'delete']);
Route::post('/update-event/{id}',[CalendarController::class,'update']);
Route::get('/retrieve-calendar-date/{date}/{color}',[CalendarController::class,'retrieve']);


Route::get('/reset', [Pages::class,'resetpassword']);

//Routes for students
Route::get('/students/Home', [Pages::class,'s_home']);
Route::get('/students/Calendar', [Pages::class,'s_calendar']);
Route::get('/students/Announcement', [AAnnouncementsController::class,'s_announcement']);
Route::get('/students/User-Info', [Pages::class,'s_userInfo']);
Route::get('/students/Time-Logs', [Pages::class,'s_timerecord']);
Route::get('/students/Announcement/View{id}', [AAnnouncementsController::class, 's_view_announcement']);
Route::get('/students/logout',[LoginController::class,'logoutStudent']);

//Routes for employees
Route::get('/employees/User-Info',[Pages::class,'e_userInfo']);
Route::get('/employees/Announcement', [AAnnouncementsController::class,'e_announcement']);
Route::get('/employees/Calendar',[Pages::class,'e_calendar']);
Route::get('/employees/Document-Request',[Pages::class,'e_document_request']);
Route::get('/employees/Document-Request/Approval/{id}',[Pages::class,'e_approvalpage']);

Route::post('/add-document-request', [DocuRequestController::class, 'addDocuRequest']);
Route::get('/employees/Time-Record',[Pages::class,'e_time_record']);
Route::get('/employees/Home',[Pages::class,'e_home']);
Route::get('/employees/Announcement/View{id}', [AAnnouncementsController::class,'e_view_announcement']);
Route::get('/employees/logout',[LoginController::class,'logoutEmployee']);

Route::get('/scanner',[Pages::class,'scanner']);
Route::get('/check-in/{id}',[CheckInOutController::class,'checkIn']);
