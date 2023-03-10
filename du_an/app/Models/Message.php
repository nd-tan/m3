<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['room_name','content', 'user_id'];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
