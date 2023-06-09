<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\post;

class category extends Model
{

    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'category';


    protected function posts()
    {
        return $this->hasMany(post::class);
    }
}
