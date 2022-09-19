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
            Alert::success('Chức vụ '.$item->name.' đã được đưa vào thùng rác!');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            Alert::error('Xóa chức vụ '.$item->name.' không thành công');
            return redirect()->route('position.index');
        }
    }
    public function softdelete()
    {
        $items=Position::onlyTrashed()->paginate(5);
        return view('admin.positon.recycle', compact('items'));
    }
    public function retrieve($id)
    {
        $item=Position::withTrashed()->where('id', $id);
        try {
            $item->restore();
            $item=Position::find($id);
            toast('khôi phục chức vụ '.$item->name.' thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            toast('khôi phục chức vụ '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('position.softdelete');
        }

    }
    public function deleted($id)
    {
        $item=Position::onlyTrashed()->findOrFail($id);
        try {
            // $image = 'public/images/'.$item->image;
            // Storage::delete($image);
            $item->forceDelete();
            Alert::success('Xóa chức vụ '.$item->name.' thành công');
            return redirect()->route('position.softdelete');
        } catch (\Exception $th) {
            Alert::error('Xóa chức vụ '.$item->name.' không thành công');
            return redirect()->route('position.softdelete');
        }
    }
}
