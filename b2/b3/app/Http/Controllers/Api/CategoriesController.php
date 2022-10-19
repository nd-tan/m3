<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $items=Category::all();
        return response()->json($items,200);
        // return view('categories.index',compact('items'));
    }

    public function create()
    {
        return view('categories.add');
    }

    public function store(Request $request)
    {
        $item= new Category();
        $item->name=$request->name;
        $items=$item->save();
        return response()->json($items,200);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item=Category::find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item=Category::find($id);
        $item->name=$request->name;
        $item->save();
        return response()->json($item,200);

        // return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $item=Category::findOrFail($id);
        $item->delete();
        return response()->json($item,200);

        // return redirect()->route('categories.index');
    }
}
