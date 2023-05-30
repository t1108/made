<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Talkroom;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments'; 
    protected $fillable = ['comment', 'user_id', 'room_id', 'back_color', 'favorite_count'];

    public static function create(array $data)
    {
        return self::query()->create($data);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function talkroom()
    {
        return $this->belongsTo(Talkroom::class, 'room_id');
    }

}

