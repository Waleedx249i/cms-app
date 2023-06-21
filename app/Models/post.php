<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\category;
use App\Models\Tag;
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
        'category_id'
    ];
    protected $table = 'posts';

    protected  function category()
    {
        return  $this->belongsTo(category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->as('tags');
    }
}
