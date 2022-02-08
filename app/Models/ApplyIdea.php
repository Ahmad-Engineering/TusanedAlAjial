<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyIdea extends Model
{
    use HasFactory;

    public function staff () {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }

    public function descs () {
        return $this->hasMany(IdeaDesc::class, 'idea_id', 'id');
    }

    public function outputs () {
        return $this->hasOne(IdeaOutputs::class, 'idea_id', 'id');
    }
}
