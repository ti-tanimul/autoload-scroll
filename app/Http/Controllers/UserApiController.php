<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class UserApiController extends Controller
{
    public function showUser(){
            $student = Student::get();
        return response($student);
    }
    public function addUser(Request $request){
        // if($request->isMethod("post")){
            $data = $request->all();
            $student = Student::create($data);
            return response($student);
        // }
    }
}

