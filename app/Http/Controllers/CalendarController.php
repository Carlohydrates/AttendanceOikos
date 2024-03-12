<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function create(Request $request){
        $user_email=Auth::guard('users')->user()->email;
        Calendar::create([
            "calendar_created"=>$request->input('date'),
            "email"=>$user_email,
            "title"=>$request->input('title'),
            "subject"=>$request->input('subject'),
            "duration"=>$request->input('duration'),
            "venue"=>$request->input('venue'),
            "theme"=>$request->input('theme'),
            "message"=>$request->input('message'),
            "color"=>$request->input('color'),
        ]);
        return response()->json(["success"=>true]);
    }
    public function retrieve($date){
        $user_email=Auth::guard('users')->user()->email;
        $data=Calendar::where('calendar_created',$date)->where('email',$user_email)->get();
        return response()->json(["success"=>true,"content"=>$data]);
    }
    public function delete(Request $request){
        $user_email=Auth::guard('users')->user()->email;
        Calendar::where('calendar_created',$request->input('date'))
        ->where('email',$user_email)
        ->delete();
        return response()->json(["success"=>true]);
    }
    public function update(Request $request){
        $user_email=Auth::guard('users')->user()->email;
        Calendar::where('calendar_created',$request->input('date'))
        ->where('email',$user_email)
        ->update([
            "title"=>$request->input('title'),
            "subject"=>$request->input('subject'),
            "duration"=>$request->input('duration'),
            "venue"=>$request->input('venue'),
            "theme"=>$request->input('theme'),
            "message"=>$request->input('message'),
            "color"=>$request->input('color'),
        ]);
        return response()->json(["success"=>true]);
    }
}
