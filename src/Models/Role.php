<?php

namespace Farojas85\checkRole\Models;

use Config;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'special'];

    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(config('auth.model') ?: config('auth.providers.users.model'))->withTimestamps();
    }
}
