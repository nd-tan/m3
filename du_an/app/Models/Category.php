<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{
    use HasFactory;
    use Notifiable,
    SoftDeletes;// add soft delete
    protected $table ='categories';
    protected $fillable = ['name'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
