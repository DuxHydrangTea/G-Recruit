<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
class Esport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'esport_name',
        'description',
        'icon',
        'delete_at',
        'created_at',
        'updated_at',
    ];
    public function rank()
    {
        return $this->hasMany(Rank::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function esportTeam()
    {
        return $this->hasMany(EsportTeam::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}