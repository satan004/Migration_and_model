<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'profile', 'password'];
    protected $hidden = ['password'];

    public function classes(): BelongsToMany {
        return $this->belongsToMany(Classes::class, 'teacher_class_subjects', 'teacher_id', 'class_id')
                    ->withPivot('subject_id');
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class, 'teacher_class_subjects', 'teacher_id', 'subject_id')
                    ->withPivot('class_id');
    }
}
