<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    // Explicitly declaring 'classes' table name since 'class' is a protected PHP keyword
    protected $table = 'classes';
    protected $fillable = ['name', 'description'];

    public function students(): BelongsToMany {
        return $this->belongsToMany(Student::class, 'student_classes', 'class_id', 'student_id');
    }

    public function terms(): BelongsToMany {
        return $this->belongsToMany(Term::class, 'add_class_to_terms', 'class_id', 'term_id');
    }

    public function teachers(): BelongsToMany {
        return $this->belongsToMany(Teacher::class, 'teacher_class_subjects', 'class_id', 'teacher_id')
                    ->withPivot('subject_id');
    }
}
