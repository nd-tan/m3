<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        // $items = Product::all();
        $items = Product::paginate(3);
        $suppliers=Supplier::all();
        return view('admin.products.index', compact('items','suppliers'));
    }

    public function create()
    {
        $items = Category::all();
        $suppliers=Supplier::all();
        return view('admin.products.add', compact('items','suppliers'));
    }

    public function store(ProductCreateRequest $request)
    {
        $items = Category::all();
        $suppliers=Supplier::all();

        $param=[
            'items'=>$items,
            'request'=>$request,
            'suppliers'=>$suppliers,
        ];
        $item = new Product();
        $item->name = $request->name;
        $item->age = $request->age;
        $item->color = $request->color;
        $item->gender = $request->gender;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->category_id = $request->category_id;
        $item->supplier_id = $request->supplier;

        $file = $request->inputFile;

        if ($request->hasFile('inputFile')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            $item->save();
            toast('Thêm sản phẩm thành công!','success','top-right');
            return redirect()->route('product.index');
        } catch (\Exception $th) {
            toast('Lối logic!','error','top-right');
            $image = 'public/images/'.$item->image;
            Storage::delete($image);
            return view('admin.products.add', $param);
            // return redirect()->route('product.add');
        }

    }

    public function show($id)
    {
        $item=Product::find($id);
        return view('admin.products.detail', compact('item'));
    }

    public function edit($id)
    {
        $items = Category::all();
        $item=Product::find($id);
        return view('admin.products.edit', compact('item', 'items'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $item=Product::find($id);
        $item->name = $request->name;
        $item->age = $request->age;
        $item->color = $request->color;
        $item->gender = $request->gender;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->category_id = $request->category_id;

        $file = $request->inputFile;
        // dd($request);

        if ($request->hasFile('inputFile')) {
            // dd($item->image);
            $image = 'public/images/'.$item->image;
            Storage::delete($image);

            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }

        try {
            $item->save();
            // Storage::delete($image);
            toast('Sửa sản phẩm '.$item->name.' thành công!','success','top-right');
            return redirect()->route('product.index');
        } catch (\Exception $th) {
            toast('Lối logic!','error','top-right');
            $image = 'public/images/'.$fileExtension;
            Storage::delete($image);
            return redirect()->route('product.edit',$item->id);
            // return redirect()->route('product.add');
        }

    }

    public function destroy($id)
    {
        $item=Product::findOrFail($id);
        try {
            $item->delete();
            $image = 'public/images/'.$item->image;
            Storage::delete($image);
            Alert::success('Xóa sản phẩm '.$item->name.' thành công');
            return redirect()->route('product.index');
        } catch (\Exception $th) {
            Alert::error('Xóa sản phẩm '.$item->name.' không thành công');
            return redirect()->route('product.index');
        }

    }
}
