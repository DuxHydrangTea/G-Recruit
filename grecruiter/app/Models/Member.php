<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'esport_id',
        'user_id',
        'position_id',
        'confirm',
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