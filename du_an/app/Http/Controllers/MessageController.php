<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;
use Illuminate\Support\Facades\DB;

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
            return view('admin.message.index');
        }
    }
}
