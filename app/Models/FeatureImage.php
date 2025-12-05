<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureImage extends Model
{
    public function post() : BelongsTo {
        return $this->belongsTo(Post::class);
    }
}
