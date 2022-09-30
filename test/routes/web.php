<?php

use App\Http\Controllers\Customerscontroller;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('hai', function () {
//    dd(Customer::all());
// });
// Route::get('hai/{id?}', function ($id=5) {
// return 'hai'.$id.'tuol';
//  });
 Route::get('index',[Customerscontroller::class,'index'])->name("index");

 Route::get('add',[Customerscontroller::class,'create']);
 Route::post('store',[Customerscontroller::class,'store'])->name("store");

 Route::get('edit/{id}',[Customerscontroller::class,'edit'])->name("edit");
 Route::post('update/{id}',[Customerscontroller::class,'update'])->name("update");

 Route::post('destroy/{id}',[Customerscontroller::class,'destroy'])->name("destroy");

//  Route::controller(CategoryController::class)->group(function () {
//     Route::get('index', 'index')->name('index');
//     Route::get('add', 'add')->name('add');
//     Route::get('edit/{id}', 'edit')->name('edit');

//  });
//  Route::get('time', function () {
//     return view('times');
// });
// Route::get('/{timezone?}', function ($timezone = null) {
//     if (!empty($timezone)) {

//         // Khởi tạo giá trị giờ theo múi giờ UTC
//         $time = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('UTC'));

//         // Thay đổi về múi giờ được chọn
//         $time->setTimezone(new DateTimeZone(str_replace('-', '/', $timezone)));

//         // Hiển thị giờ theo định dạng mong muốn
//         echo 'Múi giờ bạn chọn ' . $timezone . ' hiện tại đang là: ' . $time->format('d-m-Y H:i:s');
//     }
//     return view('times');
// });
// Route::prefix("customer")->group(function(){
//     Route::get('/index',function(){
//         echo "hiển thị danh sách khách hàng";
//         return view('task');
//     });
//     Route::get('/create',function(){
//         //  Hiển thị Form tạo khách hàng;
//         echo "them khach hang";
//     });
//     Route::post('/store',function(){
//         // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form;
//     });
//     Route::get('/show',function(){
//         // Hiển thị thông tin chi tiết khách hàng có mã định danh id;
//         echo "hien thi thong tin khach hang dc chon xem chi tiet";
//     })->name('customer.show');
//     Route::get('/edit',function(){
//         // Hiển thị Form chỉnh sửa thông tin khách hàng;
//         echo "hien thi thong tin khach hang dc sua";
//     })->name('customer.edit');
//     Route::patch('/update',function(){
//         // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form;

//     });
//     Route::get('/delete',function(){
//         // xóa thông tin khách hàng khách hàng;
//         echo "xoa khach hang";
//     })->name('customer.delete');

// });
