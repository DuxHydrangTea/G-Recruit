<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'position_id',
        'confirm',
        'esport_team_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class);
    }
}