<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Topic extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'topic_name',
        'esport_id',
        'slug',
        'description',
        'apply_type_id',
        'user_id',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'topic_name'
            ]
        ];
    }
    public function esport()
    {
        return $this->belongsTo(Esport::class)->withDefault();
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


    /**
     * Lấy ra những đề tài của CHUNG và của riêng NGƯỜI DÙNG - do người dùng tự tạo
     * Lấy theo id Bộ môn esport
     * Và chỉ dành cho người dùng chuyên đăng bài xin tuyển
     * @param mixed $query
     * @param int $esport_id
     * @return mixed
     */
    public function scopeWithMyTopics($query, $esport_id)
    {
        return $query->whereIn('user_id', [0, Auth::user()->id])->when($esport_id, function ($query, $esport_id) {
            return $query->whereIn('esport_id', [0, $esport_id]);
        })->where('apply_type_id', 1);
    }
}