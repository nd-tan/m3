<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhaCungCapController extends Controller
{
    public function index()
    {
        $table=DB::table('nhacungcap')->WHERE('TENGIAODICH','=','VINAMILK')->select('DIACHI','DIENTHOAI')->first();
        dd($table);
    }
}
