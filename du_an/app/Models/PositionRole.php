<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionRole extends Model
{
    use HasFactory;
    protected $table ='position_role';
    protected $fillable = ['position_id', 'role_id'];
}
