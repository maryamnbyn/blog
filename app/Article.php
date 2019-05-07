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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSectionBodyAttribute()
    {
        return Str::words($this->body,15);
    }
}
