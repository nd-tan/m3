<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $items=Category::search()->paginate(5);
        return view('admin.categories.index',compact('items'));
    }

    public function add()
    {
        $this->authorize('create', Category::class);
        return view('admin.categories.add');
    }

    public function store(CategoryRequest $request)
    {
        $item= new Category();
        $item->name=$request->name;
        try {
            $item->save();
            toast('Thêm danh mục thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            toast('Thêm danh mục không thành công!','error','top-right');
            return redirect()->route('category.index');
        }
    }

    public function edit($id)
    {
        $item=Category::find($id);
        $this->authorize('update', Category::class);
        return view('admin.categories.edit',compact('item'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $item=Category::find($id);
        $item->name=$request->name;
        try {
            $item->save();
            toast('Sửa danh mục thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $th) {
            toast('Sửa danh mục không thành công!','error','top-right');
            return redirect()->route('category.index');
        }
    }

    public function destroy($id)
    {
        $item=Category::findOrFail($id);
        $this->authorize('delete', Category::class);
        $value=DB::table('categories')->join('products','categories.id','=','products.category_id')
        ->select(DB::raw('count(products.id), categories.id'))
        ->groupBy('categories.id')->where('categories.id','=',$id)->get();
        if(empty($value->toArray()))
        {
            try {
                $item->delete();
                toast('Danh mục đã được đưa vào thùng rác!','success','top-right');
                return redirect()->route('category.index');
            } catch (\Exception $th) {
                toast('Danh mục chưa được đưa vào thùng rác!','error','top-right');
                return redirect()->route('category.index');
            }
        }else{
            toast('Danh mục chưa được đưa vào thùng rác!','error','top-right');
                return redirect()->route('category.index');
        }
    }

    public function softdelete()
    {
        $items=Category::search()->onlyTrashed()->paginate(5);
        return view('admin.categories.recycle', compact('items'));
    }

    public function retrieve($id)
    {
        $this->authorize('restore',Category::class);
        try {
            $item=Category::withTrashed()->where('id', $id)->restore();
            toast('khôi phục danh mục  thành công!','success','top-right');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            // Log::error('message:'. $e->getMessage());
            toast('khôi phục danh mục không thành công!','error','top-right');
            return redirect()->route('category.softdelete');
        }
    }

    public function deleted($id)
    {
        $item=Category::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', Category::class);
        try {
            $item->forceDelete();
            toast('Xóa danh mục  thành công!','success','top-right');
            return redirect()->route('category.softdelete');
        } catch (\Exception $th) {
            toast('Xóa phục danh mục không thành công!','error','top-right');
            return redirect()->route('category.softdelete');
        }
    }
}
?>
