<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_favorite extends Model
{
    use HasFactory;
    protected $table = 'comment_favorites'; 
    protected $fillable = ['favorite', 'comment_id', 'user_id']; 

    public static function create(array $data)
    {
        return self::query()->create($data);
    }

    public $timestamps = false;
}
