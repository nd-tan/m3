<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        $users = User::getList($request);
        return view("users.index", compact('users'));
    }

    public function autocomplete(Request $request) {
        $term = $request->get('term');
        $users = User::where('name', 'LIKE', '%' . $term . '%')->get();

        $arr = [];
        foreach($users as $user) {
            $user0 = new \stdClass();
            $user0->id = $user->id;
            $user0->value = html_entity_decode($user->name);
            $arr[] = $user0;
        }

        return $arr;
    }
}
