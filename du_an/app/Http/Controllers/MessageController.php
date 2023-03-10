<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Http\Requests\ImportRequest;
use App\Imports\UsersImport;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $room = Auth()->user()->room;
        $messages = "";
        if(isset($room))
        {
            $messages = DB::table('messages')
            ->select(DB::raw("messages.content, messages.user_id, messages.room_name, messages.created_at"))
            ->where("messages.room_name", "=", $room)
            ->get();
        }
        $users = User::all();
        return view('admin.messages.index',compact('messages','users'));
    }
    public function store(Request $request){
        $id = Auth()->user()->id;
        $message = new Message();
        $message->user_id = $id;
        $message->content = $request->content;
        try {
            $message->save();
            toast('Thêm sản phẩm thành công!','success','top-right');
            return redirect()->route('message.index');
        } catch (\Exception $th) {
            toast('Lối logic!','error','top-right');
            $image = 'public/images/'.$message->image;
            return redirect()->route('message.index');
        }
    }
    public function import(ImportRequest $request){
        try {
            Excel::import(new UsersImport, $request->file('file')->store('temp'));
            Session::forget('success');
            toast('Thêm sản phẩm thành công!','success','top-right');
            return redirect()->route('message.index');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            // dd($failures);

            // foreach ($failures as $failure) {
            //     $failure->row(); // row that went wrong
            //     $failure->attribute(); // either heading key (if using heading row concern) or column index
            //     $failure->errors(); // Actual error messages from Laravel validator
            //     $failure->values(); // The values of the row that has failed.
            // }
            Log::error('message:'. $e->getMessage());
            toast('Lối logic!','error','top-right');
            return redirect()->route('message.index');
        }
    }
    public function export(){
        // dd(123);
        return Excel::download( new UserExport, 'users.xlsx');
        // return redirect()->route('message.index');
    }
}
