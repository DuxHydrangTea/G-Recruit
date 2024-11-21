<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic_name',
        'esport_id',
        'slug',
        'description',
        'apply_type_id',
    ];
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeTopicsOf($query, $esport_id)
    {
        return $query->whereIn('esport_id', [0, $esport_id])->get();
    }

    public function scopeApplyTopicsOf($query, $esport_id)
    {
        return $query->whereIn('esport_id', [0, $esport_id])->where('apply_type_id', 1)->get();
    }
}