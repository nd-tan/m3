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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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

    // public function hasPermission( $permission_name )
    // {
    //     return $user->hasPermission('Product_viewAny');
    // }
}
