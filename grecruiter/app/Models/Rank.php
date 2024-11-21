<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'rank_name',
        'esport_id',
        'icon',
        'created_at',
        'updated_at',
    ];
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}