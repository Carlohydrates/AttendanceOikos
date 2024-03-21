<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Aitj;
use App\Models\Employees;
use App\Models\User;
use App\Models\Ebackg;
use App\Models\EEducation;
use App\Models\Ereference;
use App\Models\EExperience;

use Illuminate\Http\Request;

class EmployeeUserInfoController extends Controller{
 //Adding   
public function add_fam_details(Request $request){
    date_default_timezone_set('Asia/Manila');



}

public function add_edu_details(Request $request){
    date_default_timezone_set('Asia/Manila');



}

public function add_exp_details(Request $request){
    date_default_timezone_set('Asia/Manila');



}

public function add_ref_details(Request $request){
    date_default_timezone_set('Asia/Manila');



}












 //Updating
//employee details
public function update_emp_detail(Request $request){
    Employees::where("employee_id",$request->input('id'))->update([
        "fname" =>$request->input('firstName'),
        "lname"=>$request->input('lastName'),
        "minitial"=>$request->input('middleName'),
        "extension"=>$request->input('extension'),
        "bday"=>$request->input('birthdate'),
        "phone_number"=>$request->input('phoneNumber'),
        "address"=>$request->input('address'),
        "city"=>$request->input('City'),
        "region"=>$request->input('region'),
        "postal_code"=>$request->input('postal'),
        "country"=>$request->input('country'),
        "nationality"=>$request->input('nationality'),
        "sex"=>$request->input('sex'),
        "telephone_number"=>$request->input('telephone'),


    ]);
return response()->json(["success"=>true]);
}



//family Details
public function update_fam_detail(Request $request){
    Ebackg::where("emplopyee_id",$request->input('id'))->update([
        "f_fname"=>$request->input('f_firstName'),
        "f_minitial"=>$request->input('f_middleName'),
        "f_lname"=>$request->input('f_lastname'),
        "f_extension"=>$request->input('f_extension'),

        "m_fname"=>$request->input('m_firstName'),
        "m_minitial"=>$request->input('m_middleName'),
        "m_lname"=>$request->input('m_lastname'),
        "m_extension"=>$request->input('m_extension'),

        "spouse_fname"=>$request->input('sp_firstName'),
        "spouse_minitial"=>$request->input('sp_middleName'),
        "spouse_lname"=>$request->input('sp_lastname'),
        "spouse_extension"=>$request->input('sp_extension'),
    ]);
    return response()->json(["success"=>true]);
}

//Education Details
public function update_edu_details(Request $request){
    EEducation::where("employee_id",$request -> input('id'))->update([
        "gs_school"=>$request->input('J_school'),
        "gs_year"=>$request->input('J_school'),
        "gs_contact_person"=>$request->input('J_school'),
        "gs_phone_number"=>$request->input('J_school'),

        "hs_school"=>$request->input('S_school'),
        "hs_year"=>$request->input('S_school'),
        "hs_contact_person"=>$request->input('S_school'),
        "hs_phone_number"=>$request->input('S_school'),

        "c_school"=>$request->input('C_school'),
        "c_year"=>$request->input('C_school'),
        "c_contact_person"=>$request->input('C_school'),
        "c_phone_number"=>$request->input('C_school'),
    ]);
    return response()->json(["success"=>true]);
}
public function update_exp_details(Request $request){
    EExperience::where("employee_id",$request->input('id'))->update([
        "company"=>$request->input('company_name_one'),
        "company_jobtitle_position"=>$request->input('company_title_one'),
        "company_contact"=>$request->input('company_contact_one'),
        "company_job_description"=>$request->input('company_description_one'),
        "company_duration"=>$request->input('company_duration_one'),
        "company_phone_number"=>$request->input('company_number_one'),
        "company_address"=>$request->input('company_address_one'),

        "company2"=>$request->input('company_name_two'),
        "company2_jobtitle_position"=>$request->input('company_title_two'),
        "company2_contact"=>$request->input('company_contact_two'),
        "company2_job_description"=>$request->input('company_description_two'),
        "company2_duration"=>$request->input('company_duration_two'),
        "company2_phone_number"=>$request->input('company_number_two'),
        "company2_address"=>$request->input('company_address_two'),

        "company3"=>$request->input('company_name_three'),
        "company3_jobtitle_position"=>$request->input('company_title_three'),
        "company3_contact"=>$request->input('company_contact_three'),
        "company3_job_description"=>$request->input('company_description_three'),
        "company3_duration"=>$request->input('company_duration_three'),
        "company3_phone_number"=>$request->input('company_number_three'),
        "company3_address"=>$request->input('company_address_three'),
    ]);
    return response()->json(["success"=>true]);
}

//reference Details
public function update_ref_details(Request $request){
    Ereference::where("employee_id",$request->input('id'))->update([
        "name_one"=>$request->input('reference_one_name'),
        "company_one"=>$request->input('reference_one_company'),
        "contact_one"=>$request->input('reference_one_contact'),
        "relation_one"=>$request->input('reference_one_relation'),
        "position_one"=>$request->input('reference_one_position'),

        "name_two"=>$request->input('reference_two_name'),
        "company_two"=>$request->input('reference_two_company'),
        "contact_two"=>$request->input('reference_two_contact'),
        "relation_two"=>$request->input('reference_two_relation'),
        "position_two"=>$request->input('reference_two_position'),

        "name_three"=>$request->input('reference_three_name'),
        "company_three"=>$request->input('reference_three_company'),
        "contact_three"=>$request->input('reference_three_contact'),
        "relation_three"=>$request->input('reference_three_relation'),
        "position_three"=>$request->input('reference_three_position'),
    ]);
    return response()->json(["success"=>true]);

}
}

