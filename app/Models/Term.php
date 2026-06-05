<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Term extends Model
{
    protected $fillable = ['name', 'generation_id'];

    public function generation(): BelongsTo {
        return $this->belongsTo(Generation::class);
    }

    public function classes(): BelongsToMany {
        return $this->belongsToMany(Classes::class, 'add_class_to_terms', 'term_id', 'class_id');
    }
}
