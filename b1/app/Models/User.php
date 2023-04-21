<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    protected $table ='users';

    public static function getList($request){
        $orderBy = is_null($request->get('order_by')) ? 'id' : $request->get('order_by');
        $orderArr = explode(',', $orderBy);
        $sortBy = in_array($request->get('sort_by'), ['asc', 'desc']) ? $request->get('sort_by') : 'desc';

        $user = DB::table('users');

        foreach ($orderArr as $order) {
            $user = $user->orderBy($order, $sortBy);
        }

        return $user->paginate(2);
    }
}
