<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory,Notifiable;
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('ten_sach', 'like', '%' . $key . '%')
            ->orwhere('ISBN', 'like', '%' . $key . '%')->orwhere('tac_gia', 'like', '%' . $key . '%')
            ->orwhere('the_loai', 'like', '%' . $key . '%')->orwhere('so_trang', 'like', '%' . $key . '%')
            ->orwhere('nam_xuat_ban', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
