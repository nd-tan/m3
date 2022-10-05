<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::search()->paginate(5);
        return view('Book.index', compact('books'));
    }

    public function create()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y');
        return view('Book.add',compact('date'));
    }

    public function store(BookCreateRequest $request)
    {
        $book = new Book();
        $book->ten_sach = $request->ten_sach;
        $book->ISBN = $request->isbn;
        $book->tac_gia = $request->tac_gia;
        $book->the_loai = $request->the_loai;
        $book->so_trang = $request->so_trang;
        $book->nam_xuat_ban = $request->nam_xuat_ban;
        try {
            $book->save();
            Session::flash('success', 'Thêm sách thành công!');
            return redirect()->route('book.index');
        } catch (\Exception $e) {
            // Log::error('message:'.$e->getMessage());
            Session::flash('error', 'Thêm sách thất bại!');
            return view('book.index');
        }
    }

    public function edit($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y');
        $book = Book::find($id);
        return view('Book.edit', compact('book','date'));
    }

    public function update(BookCreateRequest $request, $id)
    {
        $book = Book::find($id);
        $book->ten_sach = $request->ten_sach;
        $book->ISBN = $request->isbn;
        $book->tac_gia = $request->tac_gia;
        $book->the_loai = $request->the_loai;
        $book->so_trang = $request->so_trang;
        $book->nam_xuat_ban = $request->nam_xuat_ban;
        try {
            $book->save();
            Session::flash('success', 'Cập nhật sách thành công!');
            return redirect()->route('book.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật sách thất bại!');
            return view('book.index');
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        try {
            $book->delete();
            Session::flash('success', 'Xóa sách thành công!');
            return redirect()->route('book.index');
        } catch (\Exception $th) {
            Session::flash('error', 'Xóa sách thất bại!');
            return view('Book.index');
        }
    }
}
