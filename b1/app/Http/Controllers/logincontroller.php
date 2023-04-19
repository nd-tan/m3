<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models;
use App\Models\Login;

class logincontroller extends Controller
{
    function index()
    {
        return view("login");
    }
    function check(Request $request)
    {
        $arr=[
            'email'=>$request->email,
           'password'=>$request->password
        ];
        if(Auth::attempt($arr))
        {
            $mes="đăng nhập  thành công";
            return view('login',compact('mes'));
        }else{
            // dd(Auth::attempt($arr));
            $mes="đăng nhập không thành công";
            return view('login',compact('mes'));
            // return redirect()->route('index');

        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
    public function register()
    {
        return view('register');
    }
    public function create(Request $request)
    {
        $item=new Login();
        $item->email=$request->email;
        $item->password=bcrypt($request->password);
        $item->user_name=$request->user_name;
        $item->phone=$request->phone;
        $item->address=$request->address;

        $item->save();
        return redirect()->route('login.index');
    }
    public function checkRequest(Request $request){
        $des = $request->get('ck-editor');
        return view('login', compact('des'));
        // dd($request);
    }
}
