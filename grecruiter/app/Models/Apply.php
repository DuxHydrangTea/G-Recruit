<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $fillable = [
        'esport_team_id',
        'apply_type_id',
        'user_id',
        'position_id',
        'status',
        'message',
        'is_read',
    ];
    public function applyType()
    {
        // return $this->belongsTo(ApplyType::class);
    }

    public function scopeRecuit($query)
    {
        return $query->where('apply_type_id', 2);
    }
    public function scopeApply($query)
    {
        return $query->where('apply_type_id', 1);
    }
    public function scopeIsRecuited($query, $esport_team_id, $user_id)
    {
        return $this->where('esport_team_id', $esport_team_id)->where('user_id', $user_id)->recuit();
    }

    static public function checkRecruited($esport_team_id, $user_id)
    {
        $apply = Apply::where('esport_team_id', $esport_team_id)->where('user_id', $user_id)->recuit()->first();
        if ($apply)
            return true;
        else
            return false;
    }
}