<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function studentClass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class, 'classes_id', 'id');
    }

    public function studentViolations(): HasMany
    {
        return $this->hasMany(StudentViolation::class, 'students_id');
    }

    public function studentAchievements(): HasMany
    {
        return $this->hasMany(StudentAchievement::class, 'students_id');
    }}
