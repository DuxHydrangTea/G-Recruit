<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'topic_id',
        'abstract',
        'user_id',
        'esport_id',
        'position_id',
        'esport_team_id',
        'content',
        'thumbnail',
        'is_privated',
        'apply_type_id',
    ];
    public function scopePublic($query)
    {
        return $query->where('is_privated', 0)->orderByDesc('id');
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }





    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function applyType()
    {
        return $this->belongsTo(ApplyType::class);
    }
}