<?php

namespace App\Models;

use App\Models\BaseModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Blog extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    
    protected $table = 'blogs';

    protected $fillable = [
        'title', 'excerpt', 'content', 'page_title', 'meta_keyword', 
        'meta_description', 'published', 'head_image'
    ];

    public static function findBySlug($slug)
    {
        return static::whereSlug($slug)->firstOrFail();
    }

    public function scopePublished($query)
    {
        return $query->wherePublished(true);
    }
}
