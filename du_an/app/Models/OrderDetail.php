<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table ='order_detail';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'total'];
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('total', 'like', '%' . $key . '%');
        }
        return $query;
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
