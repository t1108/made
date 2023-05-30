<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $table = 'follows'; 
    protected $fillable = ['follow_id', 'follower_id'];

    public static function create(array $data)
    {
        return self::query()->create($data);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
    public $timestamps = false;
}
