<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }

    public function setTitleAttribute($vale)
    {
        $this->attributes['title'] = $vale;

        $this->attributes['slug'] = Str::slug($vale);
    }

    public function getUrlAttribute()
    {
        return route('posts.show', [$this->getKey(), $this->slug]);
    }
}
