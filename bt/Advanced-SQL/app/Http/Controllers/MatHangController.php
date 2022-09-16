<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatHangController extends Controller
{
    public function index()
    {
        $table = DB::table('mathang')->where('GIAHANG','>','100000')->where('SOLUONG','<','50')->select('MAHANG','TENhANG')->get();
        dd($table);
    }
}
