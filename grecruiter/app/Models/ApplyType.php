<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyType extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}