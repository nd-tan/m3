<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class coculatecontroller extends Controller
{
    function coculate(Request $request)
    {
        $mota=$request->mota;
        $gia=$request->gia;
        $tile=$request->tile;
        $luongck=$gia*$tile/100;
        $total=$gia-$luongck;
        // dd($mota);
        return view("coculate",compact("mota","gia","tile","luongck","total"));

    }
    function index()
    {
        return view("coculate");
    }
}
