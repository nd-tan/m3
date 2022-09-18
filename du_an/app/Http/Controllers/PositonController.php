<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PositonController extends Controller
{
    public function index()
    {
        // $items=Position::all();
        $items=Position::paginate(5);
        return view('admin.positon.index',compact('items'));
    }
    public function add()
    {
        return view('admin.positon.add');
    }
    public function store(PositionRequest $request)
    {
        // dd($request);
        $item=new Position();
        $item->name=$request->name;
        try {
            $item->save();
            toast('Thêm chức vụ '.$item->name.' thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Throwable $th) {
            toast('Thêm chức vụ '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('position.index');
        }
        $item->save();
        return redirect()->route('position.index');
    }
    public function edit($id)
    {
        $item=Position::find($id);
        return view('admin.positon.edit',compact('item'));
    }
    public function update(PositionRequest $request,$id)
    {
        $item=Position::find($id);
        $item->name=$request->name;
        try {
            $item->save();
            toast('Sửa chức vụ '.$item->name.' thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            toast('Sửa chức vụ '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('position.index');
        }
    }
    public function destroy($id)
    {
        $item=Position::find($id);
        try {
            $item->delete();
            Alert::success('Xóa chức vụ '.$item->name.' thành công');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            Alert::error('Xóa chức vụ '.$item->name.' không thành công');
            return redirect()->route('position.index');
        }
    }
}
