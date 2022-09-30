<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class Customerscontroller extends Controller
{
    function index()
    {
        $items=Level::all();
        $params = [
            'items' => $items,

        ];
        return view("index",$params);
    }
    function create()
    {
        return view("add");
    }
    function store(Request $request)
    {
        $item=new Level();
        $item->name=$request->name;
        $item->save();
        return redirect()->route("index");
    }
    function edit($id)
    {
        $item=Level::find($id);
        return view("edit",compact("item"));
    }
    function update(Request $request, $id)
    {
        $item=Level::find($id);
        $item->name=$request->name;
        $item->save();
        return redirect()->route("index");
    }
    function destroy($id)
    {
        $item=Level::findOrFail($id);
        $item->delete();
        return redirect()->route("index");
    }
}
