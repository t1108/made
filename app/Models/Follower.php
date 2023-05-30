<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'followers'; 
    protected $fillable = ['follower_id', 'follow_id'];

    public static function create(array $data)
    {
        return self::query()->create($data);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'follow_id');
    }
    public $timestamps = false;
}
