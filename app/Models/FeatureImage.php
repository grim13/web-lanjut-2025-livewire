<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureImage extends Model
{
    protected $fillable = [
        'post_id',
        'feature_image',
    ];
    
    public function post() : BelongsTo {
        return $this->belongsTo(Post::class);
    }
}
