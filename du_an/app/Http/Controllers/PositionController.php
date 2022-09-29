<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Models\Position_role;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Position::class);
        $items=Position::paginate(5);
        return view('admin.position.index',compact('items'));
    }

    public function add()
    {
        $this->authorize('create', Position::class);
        return view('admin.position.add');
    }

    public function store(PositionRequest $request)
    {
        $item=new Position();
        $item->name=$request->name;
        try {
            $item->save();
            toast('Thêm chức vụ thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            toast('Thêm chức vụ không thành công!','error','top-right');
            return redirect()->route('position.index');
        }
    }

    public function edit($id)
    {
        $item=Position::find($id);
        $this->authorize('update', Position::class);
        return view('admin.position.edit',compact('item'));
    }

    public function update(PositionRequest $request,$id)
    {
        $item=Position::find($id);
        $item->name=$request->name;
        try {
            $item->save();
            toast('Sửa chức vụ thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            toast('Sửa chức vụ không thành công!','error','top-right');
            return redirect()->route('position.index');
        }
    }

    public function destroy($id)
    {
        $item=Position::find($id);
        $this->authorize('delete', Position::class);
        $position=DB::table('positions')->join('position_role','positions.id','=','position_role.position_id')
        ->select(DB::raw('count(position_role.position_id), positions.id'))
        ->groupBy('positions.id')->where('positions.id','=',$id)->get();

        $user=DB::table('positions')->join('users','positions.id','=','users.position_id')
        ->select(DB::raw('count(users.position_id), positions.id'))
        ->groupBy('positions.id')->where('positions.id','=',$id)->get();
        
        if(empty($position->toArray()) && empty($user->toArray()))
        {
            try {
                $item->delete();
                toast('Chức vụ đã được đưa vào thùng rác!','success','top-right');
                return redirect()->route('position.index');
            } catch (\Exception $th) {
                toast('Chức vụ chưa được đưa vào thùng rác!','error','top-right');
                return redirect()->route('position.index');
            }
        }else{
            toast('Chức vụ chưa được đưa vào thùng rác!','error','top-right');
            return redirect()->route('position.index');
        }
    }

    public function softdelete()
    {
        $items=Position::onlyTrashed()->paginate(5);
        return view('admin.position.recycle', compact('items'));
    }

    public function retrieve($id)
    {
        $this->authorize('restore', Position::class);
        try {
            $item=Position::withTrashed()->where('id', $id)->restore();
            toast('khôi phục chức vụ thành công!','success','top-right');
            return redirect()->route('position.index');
        } catch (\Exception $th) {
            toast('khôi phục chức vụ không thành công!','error','top-right');
            return redirect()->route('position.softdelete');
        }
    }

    public function deleted($id)
    {
        $item=Position::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', Position::class);
        try {
            $item->forceDelete();
            toast('Xóa chức vụ thành công!','success','top-right');
            return redirect()->route('position.softdelete');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            toast('Xóa chức vụ không thành công!','error','top-right');
            return redirect()->route('position.softdelete');
        }
    }

    public function detail($id)
    {
        $this->authorize('view', Position::class);
        $item=Position::find($id);

        $current_user = Auth::user();
        $userRoles = $item->roles->pluck('id', 'name')->toArray();
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
        return view('admin.position.detail',$params);
    }

    public function update_position(Request $request,$id)
    {
        try {
            $item= Position::find($id);
            $item->roles()->detach();
            $item->roles()->attach($request->roles);
            /////có thể dùng attach detach hoặc là sync(đồng bộ hóa)
            // $item->roles()->sync($request->roles,$id);
            // dd(98765);
            toast('Cập nhật quyền của chức vụ thành công!','success','top-right');
            return redirect()->route('position.detail',$id);
        } catch (\Exception $th) {
            toast('Cập nhật quyền của chức vụ không thành thành công!','error','top-right');
            return redirect()->route('position.detail',$id);
        }
    }
}
