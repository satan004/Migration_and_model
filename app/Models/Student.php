<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = ['student_id', 'profile', 'last_name', 'first_name', 'gender', 'email', 'password', 'province', 'generation_id'];
    protected $hidden = ['password'];

    public function generation(): BelongsTo {
        return $this->belongsTo(Generation::class);
    }

    public function classes(): BelongsToMany {
        return $this->belongsToMany(Classes::class, 'student_classes', 'student_id', 'class_id');
    }
}
