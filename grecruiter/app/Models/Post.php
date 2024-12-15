<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
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
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
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
        return $this->belongsTo(User::class)->withDefault();
    }
    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }
    public function esport()
    {
        return $this->belongsTo(Esport::class)->withDefault();
    }


    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class)->withDefault();
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
        return $this->belongsTo(ApplyType::class)->withDefault();
    }

    // ============ METHOD ==============
    public function getAuthor()
    {
        if ($this->esportTeam)
            return $this->esportTeam;
        return $this->user;
    }

    public function isLiked()
    {
        $user = auth()->user();
        $like = Like::where(
            ['user_id' => $user->id, 'post_id' => $this->id]
        )->first();
        if ($like)
            return true;
        else
            return false;
    }
}