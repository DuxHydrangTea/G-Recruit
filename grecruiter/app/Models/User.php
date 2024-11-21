<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Esport;
use App\Models\Apply;
use Auth;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'avatar',
        'birthday',
        'esport_id',
        'nickname',
        'rank_points',
        'rank_id',
        'position_id',
        'advantage_1',
        'advantage_2',
        'advantage_3',
        'is_admin',
        'bio',
        'esport_team_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ================ RELATIONSHIP ======================
    public function esport()
    {
        return $this->belongsTo(Esport::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
    public function timeline()
    {
        return $this->hasMany(TimeLine::class);
    }
    public function esportTeams()
    {
        return $this->belongsToMany(EsportTeam::class, 'members');
    }
    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //========== SCOPE =====================
    public function scopeAdmins($query)
    {
        return $query->where('is_admin', true);
    }

    public function scopeNotAdmins($query)
    {
        return $query->where('is_admin', false);
    }



    //============== METHOD ======================
    public function founderOfTeam(): bool
    {

        if ($this->esport_team_id == 0 || $this->esport_team_id == null)
            return false;
        $team = EsportTeam::find($this->esport_team_id);

        if ($team)
            return true;
        else
            return false;
    }
    public function isRecruitedBy()
    {
        $id_team = EsportTeam::find(Auth::user()->esport_team_id)->id;
        if ($id_team == 0 || $id_team == null)
            return false;
        $apply = Apply::where('esport_team_id', $id_team)->where('user_id', $this->id)->recuit()->first();
        if ($apply)
            return true;
        else
            return false;
    }

    public function beJoinedTeam()
    {
        $member = Member::where('user_id', $this->id)->first();

        return $member->esportTeam ?? false;
    }
}