<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}