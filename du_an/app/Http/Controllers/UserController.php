<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $items=User::paginate(5);
        // dd($items);
        return view('admin.users.index', compact('items'));
    }
    public function show($id)
    {
        // dd($id);
        $item=User::find($id);
        return view('admin.users.detail',compact('item'));
    }
}
