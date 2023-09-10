<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\category;
use App\Models\Tag;
use App\Models\user;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'discription',
        'content',
        'image',
        'category_id',
        'user_id'
    ];
    protected $table = 'posts';

    public  function category()
    {
        return  $this->belongsTo(category::class);
    }
    public  function user()
    {
        return  $this->belongsTo(user::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->as('tags');
    }
}
