<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function positions()
    {
        return $this->belongsToMany(Order::class, 'position_role', 'role_id', 'position_id');
    }
}
