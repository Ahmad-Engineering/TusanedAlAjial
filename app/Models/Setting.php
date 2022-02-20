<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function adminSettings () {
        return $this->hasMany(AdminSettings::class, 'settings_type', 'type');
    }
}
