<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentClass extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'classes_id', 'id');
    }

    public function homeroomTeacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'homeroom_teachers_id', 'id');
    }}
