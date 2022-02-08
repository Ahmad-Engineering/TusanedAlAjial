<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function ideas () {
        return $this->hasMany(ApplyIdea::class, 'staff_id', 'id');
    }
}
