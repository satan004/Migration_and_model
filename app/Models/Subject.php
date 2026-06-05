<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $fillable = ['name', 'description'];

    public function teachers(): BelongsToMany {
        return $this->belongsToMany(Teacher::class, 'teacher_class_subjects', 'subject_id', 'teacher_id')
                    ->withPivot('class_id');
    }
}
