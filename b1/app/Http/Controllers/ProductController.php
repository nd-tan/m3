<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(){
        $listUser = User::all();
        $users = [];
        foreach($listUser as $user){
            $user0 = new \stdClass();
            $user0->id = $user->id;
            $user0->value = html_entity_decode($user->name);
            $users[] = $user0;
        }
        return view('products.store', compact('users'));
    }
}
