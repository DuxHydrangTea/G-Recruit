<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EsportTeam extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'avatar',
        'esport_id',
        'description',
    ];
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function members()
    {
        return $this->belongsToMany(User::class, 'members');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}