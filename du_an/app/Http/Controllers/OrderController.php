<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $items=Order::search()->paginate(5);
        return view('admin.orders.index',compact('items'));
    }
    public function detail($id)
    {
        $this->authorize('view', Order::class);
        $items=DB::table('order_detail')
        ->join('orders','order_detail.order_id','=','orders.id')
        ->join('products','order_detail.product_id','=','products.id')
        ->select('products.*', 'order_detail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('admin.orders.order_detail',compact('items'));
    }
}
