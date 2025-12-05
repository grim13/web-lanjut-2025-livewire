<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $table = 'posts';

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feature_image() :HasOne
    {
        return $this->hasOne(FeatureImage::class);
    }

    public function catagories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }
}
