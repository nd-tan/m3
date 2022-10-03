<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;
    use Notifiable,
    SoftDeletes;// add soft delete
    protected $fillable = ['name','age','color','gender','price','quantity','image','category_id','supplier_id','user_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderdetail', 'product_id', 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->join('categories', 'products.category_id','=','categories.id')
            ->join('suppliers','products.supplier_id','=','suppliers.id')
            ->select('products.*', 'categories.name as cate', 'suppliers.name as supli')->where('products.name', 'like', '%' . $key . '%')
            ->orwhere('age', 'like', '%' . $key . '%')
            ->orwhere('color', 'like', '%' . $key . '%')->orwhere('gender', 'like', '%' . $key . '%')
            ->orwhere('price', 'like', '%' . $key . '%')->orwhere('quantity', 'like', '%' . $key . '%')
            ->orwhere('categories.name', 'like', '%' . $key . '%')
            ->orwhere('suppliers.name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
