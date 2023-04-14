<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'student_violations';

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violations_id');
    }

}
