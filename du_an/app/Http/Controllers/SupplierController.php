<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Supplier::class);
        $items=Supplier::paginate(5);
        return view('admin.suppliers.index', compact('items'));
    }

    public function create()
    {
        $this->authorize('create', Supplier::class);
        return view('admin.suppliers.add');
    }

    public function store(SupplierCreateRequest $request)
    {
        $item=new Supplier();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->address=$request->address;
        $item->phone=$request->phone;
        try {
            $item->save();
            toast('Thêm nhà cung cấp thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('Thêm nhà cung cấp không thành công!','error','top-right');
            return redirect()->route('supplier.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item=Supplier::find($id);
        $this->authorize('update', $item);
        return view('admin.suppliers.edit',compact('item'));
    }

    public function update(SupplierUpdateRequest $request, $id)
    {
        $item=Supplier::find($id);
        $item->name=$request->name;
        $item->email=$request->email;
        $item->address=$request->address;
        $item->phone=$request->phone;
        try {
            $item->save();
            toast('Sửa nhà cung cấp thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('Sửa nhà cung cấp không thành công!','error','top-right');
            return redirect()->route('supplier.index');
        }
    }

    public function destroy($id)
    {
        $item=Supplier::find($id);
        $this->authorize('delete', $item);
        try {
            $item->delete();
            toast('Nhà cung cấp đã được đưa vào thung rác!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('Nhà cung cấp chưa được đưa vào thung rác!','error','top-right');
            return redirect()->route('supplier.index');
        }
    }

    public function softdelete()
    {
        $items=Supplier::onlyTrashed()->paginate(5);
        return view('admin.suppliers.recycle', compact('items'));
    }

    public function retrieve($id)
    {
        $item=Supplier::withTrashed()->where('id', $id);
        $this->authorize('restore', $item);
        try {
            $item->restore();
            $item=Supplier::find($id);
            toast('khôi phục nhà cung cấp thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('khôi phục nhà cung cấp không thành công!','error','top-right');
            return redirect()->route('supplier.softdelete');
        }
    }
    
    public function deleted($id)
    {
        $item=Supplier::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $item);
        try {
            $item->forceDelete();
            toast('Xóa nhà cung cấp thành công!','success','top-right');
            return redirect()->route('supplier.softdelete');
        } catch (\Exception $th) {
            toast('Xóa nhà cung cấp không thành công!','error','top-right');
            return redirect()->route('supplier.softdelete');
        }
    }
}
