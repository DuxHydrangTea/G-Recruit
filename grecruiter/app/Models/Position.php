<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Schema;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = [
        'id',
        'position_name',
        'description',
        'esport_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    // scope
    public function scopePositionsOf($query, $esport_id)
    {
        return $query->where('esport_id', 0)->orWhere('esport_id', $esport_id)->get();
    }
}