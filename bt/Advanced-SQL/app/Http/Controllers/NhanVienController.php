<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    public function index()
    {
        $table=DB::table('loaihang')
        ->join('mathang', 'loaihang.MALOAIHANG', '=', 'mathang.MALOAIHANG')
        ->select('loaihang.TENLOAIHANG', 'loaihang.MALOAIHANG', 'mathang.TENHANG')
        ->OrderBy('loaihang.MALOAIHANG')
        ->get();
        dd($table);
    }
}
