<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
    	'title', 'content', 'category_id', 'featured', 'slug', 'user_id', 'views'
    ];

    public function getFeaturedAttribute($featured)
    {
    	return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return visits($this)->relation();
    }
}
