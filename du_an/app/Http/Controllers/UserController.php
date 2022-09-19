<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserupdateRequest;
use App\Models\Position;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {
        $items = User::paginate(5);
        // dd($items);
        return view('admin.users.index', compact('items'));
    }
    public function show($id)
    {
        // dd($id);
        $item = User::find($id);
        return view('admin.users.detail', compact('item'));
    }
    public function login(Request $request)
    {
        if(Auth::check())
        {
            return redirect()->route('index');
        }else{
            return view('admin.users.login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function checklogin(LoginRequest $request)
    {
        $arr=[
            'email'=>$request->email,
           'password'=>$request->password
        ];
        if(Auth::attempt($arr))
        {
            toast('Chào ' . Auth()->user()->name . ' đến với AdminShop!', 'success', 'top-right');
            return redirect()->route('index');
        }else{
            toast('Email hoặc mật khẩu không đúng!', 'error', 'top-right');
            return redirect()->route('login');
        }
    }
    public function register()
    {
        $positions=Position::all();
        return view('admin.users.add',compact('positions'));
    }
    public function checkregister(RegisterRequest $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->password = bcrypt("admin");
        $item->position_id=$request->position;


        $file = $request->inputFile;

        if ($request->hasFile('inputFile')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            toast('Thêm nhân viên ' . $item->name . ' thành công!', 'success', 'top-right');
            $item->save();
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Lỗi logic hoặc mật khẩu nhập lại không đúng!','error','top-right');
            $image = 'public/images_admin/'.$item->image;
            Storage::delete($image);
            return view('admin.users.add');
        }
    }
    public function edit($id)
    {
        $positions=Position::all();
        $item=User::find($id);
        return view('admin.users.edit', compact('item', 'positions'));
    }
    public function update(UserupdateRequest $request,$id)
    {
        $item=User::find($id);
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->position_id=$request->position;

        $file = $request->inputFile;
        // dd($request);

        if ($request->hasFile('inputFile')) {
            // dd($item->image);
            $image = 'public/images_admin/'.$item->image;
            Storage::delete($image);

            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            $item->save();
            toast('Sửa nhân viên '.$item->name.' thành công!','success','top-right');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Lối logic!','error','top-right');
            $image = 'public/images_admin/'.$fileExtension;
            Storage::delete($image);
            return redirect()->route('user.edit',$item->id);
        }
    }
    public function destroy($id)
    {
        $item=User::findOrFail($id);
        try {
            $item->delete();
            // $image = 'public/images_admin/'.$item->image;
            // Storage::delete($image);
            Alert::success('Nhân viên '.$item->name.' đã được đưa vào thùng rác!');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            Alert::error('Nhân viên '.$item->name.' chưa được đưa vào thùng rác!');
            return redirect()->route('user.index');
        }
    }
    public function softdelete()
    {
        $items=User::onlyTrashed()->paginate(5);
        return view('admin.users.recycle', compact('items'));
    }
    public function retrieve($id)
    {
        $item=User::withTrashed()->where('id', $id);
        try {
            $item->restore();
            $item=User::find($id);
            toast('khôi phục nhân viên '.$item->name.' thành công!','success','top-right');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('khôi phục nhân viên '.$item->name.' không thành công!','error','top-right');
            return redirect()->route('user.softdelete');
        }
    }
    public function deleted($id)
    {
        $item=User::onlyTrashed()->findOrFail($id);
        try {
            $image = 'public/images_admin/'.$item->image;
            Storage::delete($image);
            $item->forceDelete();
            Alert::success('Xóa nhân viên '.$item->name.' thành công');
            return redirect()->route('user.softdelete');
        } catch (\Exception $th) {
            Alert::error('Xóa nhân viên '.$item->name.' không thành công');
            return redirect()->route('user.softdelete');
        }
    }
}
