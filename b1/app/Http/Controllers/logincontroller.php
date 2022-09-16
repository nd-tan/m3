<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    function index()
    {
        return view("login");
    }
    function check(Request $request)
    {
        $id=$request->id;
        $pw=$request->pw;
        // dd($id);
        if($id=="admin" && $pw=="admin")
        {
            $b="hello admin";
        }else{
            $b="ten dang nhap hoac mat khau khong dung";
        }
        return view("login",compact("b"));
    }
}
