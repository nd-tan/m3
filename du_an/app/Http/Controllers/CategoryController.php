<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $items=Category::paginate(5);
        return view('admin.categories.index',compact('items'));
    }
    /////add
    public function add()
    {
        return view('admin.categories.add');
    }
    public function store(CategoryRequest $request)
    {
        $item= new Category();
        $item->name=$request->name;
        try {
            $item->save();
            toast('Thêm danh mục '.$item->name.' thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            toast('Thêm danh mục '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('category.index');
        }
    }
    ////edit
    public function edit($id)
    {
        $item=Category::find($id);
        return view('admin.categories.edit',compact('item'));
    }
    public function update(CategoryRequest $request,$id)
    {
        $item=Category::find($id);
        $item->name=$request->name;
        try {
            $item->save();
            toast('Sửa danh mục '.$item->name.' thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            toast('Sửa danh mục '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('category.index');
        }
    }
    public function destroy($id)
    {
        $item=Category::findOrFail($id);
        try {
            $item->delete();
            Alert::success('Xóa danh mục '.$item->name.' thành công');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            Alert::error('Xóa danh mục '.$item->name.' không thành công');
            return redirect()->route('category.index');
        }

    }
    public function softdelete()
    {
        $items=Category::onlyTrashed()->paginate(5);
        return view('admin.categories.recycle', compact('items'));
    }
    public function retrieve($id)
    {
        $item=Category::withTrashed()->where('id', $id);
        try {
            $item->restore();
            $item=Category::find($id);
            toast('khôi phục danh mục '.$item->name.' thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            toast('khôi phục danh mục '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('category.softdelete');
        }
    }
    public function deleted($id)
    {
        $item=Category::onlyTrashed()->findOrFail($id);
        try {
            // $image = 'public/images_admin/'.$item->image;
            // Storage::delete($image);
            $item->forceDelete();
            Alert::success('Xóa danh mục '.$item->name.' thành công');
            return redirect()->route('category.softdelete');
        } catch (\Exception $th) {
            Alert::error('Xóa danh mục '.$item->name.' không thành công');
            return redirect()->route('category.softdelete');
        }
    }
}
