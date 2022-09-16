<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class Customerscontroller extends Controller
{
    function index()
    {
        $items=Customer::all();
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
        $item=new Customer();
        $item->name=$request->name;
        $item->save();
        return redirect()->route("index");
    }
    function edit($id)
    {
        $item=Customer::find($id);
        return view("edit",compact("item"));
    }
    function update(Request $request, $id)
    {
        $item=Customer::find($id);
        $item->name=$request->name;
        $item->save();
        return redirect()->route("index");
    }
    function destroy($id)
    {
        $item=Customer::findOrFail($id);
        $item->delete();
        return redirect()->route("index");
    }
}
