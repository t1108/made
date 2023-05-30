<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_favorite extends Model
{
    use HasFactory;
    protected $table = 'room_favorites';
    protected $fillable = ['favorite', 'talkroom_id', 'user_id'];

    public $timestamps = false;

    public static function create(array $data){
        return self::query()->create($data);
    }
    public function talkroom()
    {
        return $this->belongsTo(talkroom::class, 'talkroom_id');
    }
}
