<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Supplier::class);
        $items=Supplier::paginate(5);
        return view('admin.suppliers.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Supplier::class);
        return view('admin.suppliers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierCreateRequest $request)
    {
        $item=new Supplier();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->address=$request->address;
        $item->phone=$request->phone;
        try {
            $item->save();
            toast('Thêm nhà cung cấp '.$item->name.' thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('Thêm nhà cung cấp '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('supplier.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Supplier::find($id);
        $this->authorize('update', $item);
        return view('admin.suppliers.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierUpdateRequest $request, $id)
    {
        $item=Supplier::find($id);
        $item->name=$request->name;
        $item->email=$request->email;
        $item->address=$request->address;
        $item->phone=$request->phone;
        // dd($request);
        $values=Supplier::all();
        foreach($values as $value)
        {
            if($value->id==$id)
            {
                continue;
            }
            if($value->email==$request->email)
            {
                toast($item->email.' đã được sử dụng!','error','top-right');
                return view('admin.suppliers.edit', compact( 'item'));
            }
        }
        try {
            $item->save();
            toast('Sửa nhà cung cấp '.$item->name.' thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('Sửa nhà cung cấp '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('supplier.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Supplier::find($id);
        $this->authorize('delete', $item);
        try {
            $item->delete();
            Alert::success('Nhà cung cấp '.$item->name.' đã được đưa vào thung rác!');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            Alert::error('Nhà cung cấp '.$item->name.' chưa được đưa vào thung rác');
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
            toast('khôi phục nhà cung cấp '.$item->name.' thành công!','success','top-right');
            return redirect()->route('supplier.index');
        } catch (\Exception $th) {
            toast('khôi phục nhà cung cấp '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('supplier.softdelete');
        }
    }
    public function deleted($id)
    {
        $item=Supplier::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $item);
        try {
            // $image = 'public/images/'.$item->image;
            // Storage::delete($image);
            $item->forceDelete();
            Alert::success('Xóa nhà cung cấp '.$item->name.' thành công');
            return redirect()->route('supplier.softdelete');
        } catch (\Exception $th) {
            Alert::error('Xóa nhà cung cấp '.$item->name.' không thành công');
            return redirect()->route('supplier.softdelete');
        }
    }
}
