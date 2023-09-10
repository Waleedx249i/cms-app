<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'user_id',
        'facebook',
        'twitter',
        'insta',
        'about'
    ];
    protected $table = 'profiles';

    protected  function user()
    {
        return  $this->belongsTo(user::class);
    }
}
