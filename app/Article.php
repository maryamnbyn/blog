<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use Sluggable;
    protected $fillable = [
        'title',
        'body',
        'slug',
        'article_pic',
        'category_id',
        'user_id'
    ];
    protected $appends=['section_body'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getSectionBodyAttribute()
    {
        return Str::words($this->body,11);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function storeFile($pic)
    {
        if (!empty(request()->file('articlePic')))
        {
            $picName = $pic->store('public/upload', 'asset');
            $articlePic = pathinfo($picName, PATHINFO_BASENAME);
            $this->update([
                'article_pic' => $articlePic
            ]);
        }
    }
}
