<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Userpassword;
use App\Http\Requests\UserupdateRequest;
use App\Models\Position;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $items = User::paginate(5);
        // dd($items);
        return view('admin.users.index', compact('items'));
    }

    public function show($id)
    {
        $this->authorize('view', User::class);
        $item = User::find($id);
        return view('admin.users.detail', compact('item'));
    }

    public function login()
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
        $this->authorize('create', User::class);
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
        $item->gender=$request->gender;
        $item->birthday=$request->birthday;
        $file = $request->inputFile;
        if ($request->hasFile('inputFile')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            toast('Thêm nhân viên thành công!', 'success', 'top-right');
            $item->save();
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Thêm nhân viên không thành công!','error','top-right');
            $image = 'public/images_admin/'.$item->image;
            Storage::delete($image);
            return view('admin.users.add');
        }
    }

    public function edit($id)
    {
        $positions=Position::all();
        $item=User::find($id);
        $this->authorize('update', $item);
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
        $item->gender=$request->gender;
        $item->birthday=$request->birthday;
        $file = $request->inputFile;
        if ($request->hasFile('inputFile')) {
            // dd($item->image);
            $images = 'public/images_admin/'.$item->image;
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            $item->save();
            if(isset($fileExtension)){
                Storage::delete($images);
            }
            toast('Sửa nhân viên thành công!','success','top-right');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Sửa nhân viên không thành công!','error','top-right');
            $image = 'public/images_admin/'.$fileExtension;
            Storage::delete($image);
            return redirect()->route('user.edit',$item->id);
        }
    }

    public function destroy($id)
    {
        $item=User::findOrFail($id);
        $this->authorize('delete', $item);
        try {
            $item->delete();
            toast('Nhân viên đã được đưa vào thùng rác!','success','top-right');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Nhân viên chưa được đưa vào thùng rác!','error','top-right');
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
        $this->authorize('restore', $item);
        try {
            $item->restore();
            $item=User::find($id);
            toast('Khôi phục nhân viên thành công!','success','top-right');
            return redirect()->route('user.index');
        } catch (\Exception $th) {
            toast('Khôi phục nhân viên không thành công!','error','top-right');
            return redirect()->route('user.softdelete');
        }
    }

    public function deleted($id)
    {
        $item=User::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $item);
        try {
            $image = 'public/images_admin/'.$item->image;
            Storage::delete($image);
            $item->forceDelete();
            toast('Xóa nhân viên thành công!','success','top-right');
            return redirect()->route('user.softdelete');
        } catch (\Exception $th) {
            toast('Xóa nhân viên không thành công!','error','top-right');
            return redirect()->route('user.softdelete');
        }
    }

    public function update_info(UserupdateRequest $request,$id)
    {
        $item=User::find($id);
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->gender = $request->gender;
        $item->birthday = $request->birthday;
        $file = $request->inputFile;
        if ($request->hasFile('inputFile')) {
            // dd($item->image);
            $images = 'public/images_admin/'.$item->image;
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            $item->save();
            if(isset($fileExtension)){
                Storage::delete($images);
            }
            toast('Sửa nhân viên thành công!','success','top-right');
            return redirect()->route('user.info');
        } catch (\Exception $th) {
            toast('Lối logic!','error','top-right');
            $image = 'public/images_admin/'.$fileExtension;
            Storage::delete($image);
            return redirect()->route('user.info',$item->id);
        }
    }
    
    public function info()
    {
        $item=Auth()->user();
        return view('admin.users.info',compact('item'));
    }

    public function change_password(Userpassword $request)
    {
        if($request->renewpassword==$request->newpassword)
        {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item=User::find(Auth()->user()->id);
                $item->password= bcrypt($request->newpassword);
                $item->save();
                toast('Thay đổi mật khẩu thành công!','success','top-right');
                return redirect()->route('user.info');
            }else{
                toast('Mật khẩu hiện tại không đúng','error','top-right');
                return redirect()->route('user.info');
            }
        }else{
            toast('Mật khẩu nhập lại không đúng','error','top-right');
            return redirect()->route('user.info');
        }
    }
}
