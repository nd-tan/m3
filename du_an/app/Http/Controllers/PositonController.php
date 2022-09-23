<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PositonController extends Controller
{
    public function index()
    {
        // $items=Position::all();
        $this->authorize('viewAny', Position::class);
        $items=Position::paginate(5);
        return view('admin.positon.index',compact('items'));
    }
    public function add()
    {
        $this->authorize('create', Position::class);
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
        $this->authorize('update', $item);
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
        $this->authorize('delete', $item);
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
        $this->authorize('restore', $item);
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
        $this->authorize('forceDelete', $item);
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
    public function detail($id)
    {
        $this->authorize('view', Position::class);
        $item=Position::find($id);

        $current_user = Auth::user();
        $userRoles = $item->roles->pluck('id', 'name')->toArray();/////
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $position_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $position_names[$role['position_name']][] = $role;
        }
        $params = [
            'item' => $item,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'position_names' => $position_names,
        ];
        return view('admin.positon.detail',$params);
    }
    public function update_position(Request $request,$id)
    {
        // try {
        //     $item = $this->UserGroupService->update($request->all(), $id);
        //     return redirect()->route('usergroups.index')->with('success', 'Cập nhật nhóm' . ' ' . $request->name . ' ' .  'thành công');
        // } catch (\Exception $e) {
        //     // Log::error($e->getMessage());
        //     return redirect()->route('usergroups.index')->with('error', 'Cập nhật nhóm' . ' ' . $request->name . ' ' .  'không thành công');
        // }
    }
}
