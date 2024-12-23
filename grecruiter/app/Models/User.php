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
use Illuminate\Support\Facades\Auth;
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
        return $this->belongsTo(Esport::class)->withDefault();
    }
    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }
    public function rank()
    {
        return $this->belongsTo(Rank::class)->withDefault();
    }
    public function timelines()
    {
        return $this->hasMany(TimeLine::class);
    }
    public function esportTeams()
    {
        return $this->belongsToMany(EsportTeam::class, 'members');
    }
    public function esportTeam()
    {
        return $this->belongsTo(EsportTeam::class)->withDefault();
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

    public function scopeNotFounders($query)
    {
        return $query->where('esport_team_id', 0);
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

    public function canBeApply(): bool
    {
        $user = User::find(Auth::user()->id);
        if ($user->esport_team_id) {
            return false;
        }
        if ($user->beJoinedTeam()) {
            return false;
        }
        return true;
    }

    public function isApply($esport_id): bool
    {
        $apply = Apply::where('esport_team_id', $esport_id)->where('user_id', Auth::user()->id)->where('apply_type_id', 1)->first();

        if ($apply) {
            return true;
        } else
            return false;
    }

    /**
     * Trả về EsportTeam là đội tuyển mà user thuộc về \n
     * Nếu user là chủ một đội tuyển thì trả về đội tuyển user sở hữu \n
     * Nếu user là thành viên của 1 đội tuyển thì sẽ trả về đội tuyển sở hữu user đó \n
     * @return mixed
     */
    public function getTeamBelong()
    {
        if ($this->esport_team_id != 0) {

            return $this->esportTeam;
        }

        $team_id = 0;
        $member = Member::where('user_id', $this->id)->first();
        if ($member) {
            $team_id = $member->esport_team_id;

            return EsportTeam::find($team_id);// return null if not found
        }
        return null;

    }
}