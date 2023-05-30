<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talkroom extends Model
{
    use HasFactory;
    protected $table = 'talkroom';
    protected $fillable = ['name', 'image', 'user_id','del_flg'];

    public $timestamps = false;

    public static function create(array $data){
        return self::query()->create($data);
    }
}
