<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaOutputs extends Model
{
    use HasFactory;

    public function idea () {
        return $this->belongsTo(ApplyIdea::class, 'idea_id', 'id');
    }
}
