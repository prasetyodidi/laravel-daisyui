<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ViolationType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function violations(): HasMany
    {
        return $this->hasMany(Violation::class, 'violation_types_id');
    }
}
