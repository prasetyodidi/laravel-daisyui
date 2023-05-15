<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentViolation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    public function reported(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violations_id');
    }
}
