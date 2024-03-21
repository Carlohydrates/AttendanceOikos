<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeMasterListController extends Controller
{
    public function create(Request $request){
        date_default_timezone_set('Asia/Manila');
        $date_employed=date('m/d/Y');
        $year=date('Y');
        $employee_id = $year . rand(100, 999);
        $email = $employee_id . "@employee.oikostech.ph";
        $password = $request->input('birthday');
        Employees::create([
            "qr"=>$request->input('position').rand(1000,9999),
            "employee_id"=>$employee_id,
            "fname" =>$request->input('firstName'),
            "email" =>$email,
            "lname" =>$request->input('lastName'),
            "minitial" =>$request->input('middleName'),
            "bday"=>$request->input('birthday'),
            "phone_number"=>$request->input('phoneNumber'),
            "extension" => $request->input('extendName'),
            "age"=>$request->input('age'),
            "date_employed"=>$date_employed,
            "telephone_number"=> $request->input('TelNumber'),
            "address" =>$request->input('address'),
            "city" =>$request->input('cityName'),
            "region"=>$request->input('regionName'),
            "postal_code"=> $request->input('postalNumber'),
            "country" => $request->input('countryName'),
            "nationality"=> $request->input('nationality'),
            "sex" => $request->input('sex'),
            "position"=>$request->input('position'),
            "status"=>"Inactive",
        ]);
        User::create([
            'id'=>$employee_id,
            'email'=>$email,
            'password'=>bcrypt($password),
            'role'=>2
        ]);
        return response()->json(["success"=>true]);
    }
    public function show(Request $request){
        $employee = Employees::where('employee_id',$request -> input('user_id'))
        -> get();
        return response()->json(["success"=>true,'user_data'=> $employee]);
    }

    public function update(Request $request){
        Employees::where("employee_id",$request->input('id')) ->update([ 
            "fname" =>$request->input('firstName'),
            "email" =>$request-> input('email'),
            "lname" =>$request->input('lastName'),
            "minitial" =>$request->input('middleName'),
            "bday"=>$request->input('birthday'),
            "phone_number"=>$request->input('phoneNumber'),
            "extension" => $request->input('extendName'),
            "age"=>$request->input('age'),
            "telephone_number"=> $request->input('TelNumber'),
            "address" =>$request->input('address'),
            "city" =>$request->input('cityName'),
            "region"=>$request->input('regionName'),
            "postal_code"=> $request->input('postalNumber'),
            "country" => $request->input('countryName'),
            "nationality"=> $request->input('nationality'),
            "sex" => $request->input('sex'),
        ]);
        return response()->json(["success"=>true]);
        }   

        public function status(Request $request){
            Employees::where("employee_id",$request->input('id')) ->update([ 
                "status" =>$request->input('select-status'), 
            ]);
            return response()->json(["success"=>true]);
            }

        public function role(Request $request){
            Employees::where("employee_id",$request->input('id')) ->update([ 
                "position" =>$request->input('select-role'),
                   
            ]);
                return response()->json(["success"=>true]);
            } 


            
            public function delete(Request $request){
                Employees::where('employee_id',$request->input('id'))
                ->delete();
                User::where('id', $request->input('id'))
                ->delete();

                return response()->json(["success"=>true]);
            }


            public function retrieveData($employee_id){
                $employee = Employees::where('employee_id',$employee_id) -> get();
                return response()-> json(["success"=> true,'user_data'=>$employee]);
            }


          
}

