<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivitySection extends Model
{
    use HasFactory;

    public function parentSection():BelongsTo
    {
        return $this->belongsTo(ActivitySection::class, 'parent_id');
    }
    public function activities():HasMany
    {
        return $this->hasMany(Activity::class);}
}
