<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Brand::class);
        $items=Brand::search()->paginate(5);
        return view('admin.brands.index',compact('items'));
    }

    public function add()
    {
        $this->authorize('create', Brand::class);
        return view('admin.brands.add');
    }

    public function store(BrandCreateRequest $request)
    {
        $item= new Brand();
        $item->name=$request->name;
        $item->phone=$request->phone;
        $item->address=$request->address;
        try {
            $item->save();
            toast('Thêm thương hiệu thành công!','success','top-right');
            return redirect()->route('brand.index');
        } catch (\Exception $th) {
            toast('Thêm thương hiệu không thành công!','error','top-right');
            return redirect()->route('brand.index');
        }
    }

    public function edit($id)
    {
        $item=Brand::find($id);
        $this->authorize('update', Brand::class);
        return view('admin.brands.edit',compact('item'));
    }

    public function update(BrandUpdateRequest $request,$id)
    {
        $item=Brand::find($id);
        $item->name=$request->name;
        $item->phone=$request->phone;
        $item->address=$request->address;
        try {
            $item->save();
            toast('Sửa thương hiệu thành công!','success','top-right');
            return redirect()->route('brand.index');
        } catch (\Exception $th) {
            toast('Sửa thương hiệu không thành công!','error','top-right');
            return redirect()->route('brand.index');
        }
    }

    public function destroy($id)
    {
        $item=Brand::findOrFail($id);
        $this->authorize('delete', Brand::class);
        $value=DB::table('brands')->join('products','brands.id','=','products.brand_id')
        ->select(DB::raw('count(products.id), brands.id'))
        ->groupBy('brands.id')->where('brands.id','=',$id)->get();
        if(empty($value->toArray()))
        {
            try {
                $item->delete();
                toast('Thương hiệu đã được đưa vào thùng rác!','success','top-right');
                return redirect()->route('brand.index');
            } catch (\Exception $th) {
                toast('Thương hiệu chưa được đưa vào thùng rác!','error','top-right');
                return redirect()->route('brand.index');
            }
        }else{
            toast('Thương hiệu đang có sản phẩm!','error','top-right');
                return redirect()->route('brand.index');
        }
    }

    public function softdelete()
    {
        $items=Brand::search()->onlyTrashed()->paginate(5);
        return view('admin.brands.recycle', compact('items'));
    }

    public function retrieve($id)
    {
        $this->authorize('restore',Category::class);
        try {
            $item=Brand::withTrashed()->where('id', $id)->restore();
            toast('khôi phục nhà cung cấp thành công!','success','top-right');
            return redirect()->route('brand.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            toast('khôi phục nhà cung cấp không thành công!','error','top-right');
            return redirect()->route('brand.softdelete');
        }
    }

    public function deleted($id)
    {
        $item=Brand::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', Brand::class);
        try {
            $item->forceDelete();
            toast('Xóa danh mục  thành công!','success','top-right');
            return redirect()->route('brand.softdelete');
        } catch (\Exception $th) {
            toast('Xóa phục danh mục không thành công!','error','top-right');
            return redirect()->route('brand.softdelete');
        }
    }
}
