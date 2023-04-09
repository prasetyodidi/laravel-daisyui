<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Violation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function studentViolations(): HasMany
    {
        return $this->hasMany(StudentViolation::class, 'violations_id');
    }

    public function violationType(): BelongsTo
    {
        return $this->belongsTo(ViolationType::class, 'violation_types_id');
    }}
