<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'slug', 'database'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
