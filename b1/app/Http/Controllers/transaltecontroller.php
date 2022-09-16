<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transaltecontroller extends Controller
{
    function index()
    {
        return view("translate");
    }
    function dich(Request $request)
    {
        $a=["hải"=>"1 nắng","cường"=>"2 nắng"];
        $name=$request->name;
        if(isset($a[$name]))
        {
            $b=$a[$name];
        }else{
            $b="không tìm thấy từ bạn muốn dịch";
        }
        return view("translate",compact("name","b"));
    }
}
