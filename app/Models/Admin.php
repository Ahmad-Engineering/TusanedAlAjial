<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    public function social()
    {
        return $this->hasOne(AdminSocial::class, 'admin_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'admin_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'admin_id', 'id');
    }

    public function setting()
    {
        return $this->hasOne(AdminSettings::class, 'admin_id', 'id');
    }
}
