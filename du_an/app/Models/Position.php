<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Position extends Model
{
    protected $table ='positions';
    use HasFactory;
    use Notifiable,
    SoftDeletes;// add soft delete
    protected $fillable = ['name', 'deleted_at'];
    public function users()
    {
        return $this->hasMany(User::class, 'position_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'position_role','position_id','role_id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
