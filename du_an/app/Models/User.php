<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
use App\Traits\HasPermissions;

class User extends Authenticatable
{
    use Notifiable,
    SoftDeletes;// add soft delete
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;
    protected $table = "users";
    protected $fillable = ['name','address','phone','image','gender','birthday','email','password','position_id'];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->join('positions','users.position_id','=','positions.id')
            ->select('users.*','positions.name as posi')
            ->where('users.name', 'like', '%' . $key . '%')->orwhere('gender', 'like', '%' . $key . '%')
            ->orwhere('address', 'like', '%' . $key . '%')->orwhere('email', 'like', '%' . $key . '%')
            ->orwhere('phone', 'like', '%' . $key . '%')->orwhere('positions.name', 'like', '%' . $key . '%');
        }
        return $query;
    }

}
