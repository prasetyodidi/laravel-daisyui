<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Achievement extends Model
{
    use HasFactory;

    public function studentAchievements(): HasMany
    {
        return $this->hasMany(StudentAchievement::class, 'achievements_id');
    }

    public function achievementType(): BelongsTo
    {
        return $this->belongsTo(AchievementType::class, 'achievement_types_id');
    }}
