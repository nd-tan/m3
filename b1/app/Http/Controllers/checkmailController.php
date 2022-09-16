<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkmailController extends Controller
{
    function index()
    {
        return view('email');
    }
    function check(Request $request)
    {
        $email=$request->email;
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $param['isEmail'] = "email rỗng hoặc không đúng định dạng";
        }else{
            $param['isEmail'] = "email đúng định dạng";
        }
        return view('email',$param);
    }
}
