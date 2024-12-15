<?php

namespace App\Models;

use Facades\App\Ultilities\StatusApply;
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
        'message_reply',
        'is_read',
        'pdf_cv',
    ];

    // public function applyType()
    // {
    //     // return $this->belongsTo(ApplyType::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }

    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class)->withDefault();
    }
    // ========= SCOPE ====================
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

    public function scopeWhereEsportTeam($query, $id)
    {
        return $query->where('esport_team_id', $id);
    }

    public function scopeAccept($query)
    {
        return $query->where('status', StatusApply::getAccept());
    }
    public function scopeDeny($query)
    {
        return $query->where('status', StatusApply::getDeny());
    }
    public function scopeWaiting($query)
    {
        return $query->where('status', StatusApply::getWaiting());
    }
    public function scopeConsider($query)
    {
        return $query->where('status', StatusApply::getConsider());
    }
    // ========= METHOD ================
    static public function checkRecruited($esport_team_id, $user_id)
    {
        $apply = Apply::where('esport_team_id', $esport_team_id)->where('user_id', $user_id)->recuit()->first();
        if ($apply)
            return true;
        else
            return false;
    }
}