<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AchievementType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function violations(): HasMany
    {
        return $this->hasMany(Achievement::class, 'achievement_types_id');
    }
}
