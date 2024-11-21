<?php

namespace App\Livewire\Profile;

use App\Models\Esport;
use App\Models\EsportTeam;
use App\Models\Member;
use App\Models\Topic;
use Auth;
use Livewire\Component;

class MyTeam extends Component
{
    public EsportTeam $team;
    public $isFounder = false;
    public $members = [];
    public $posts = [];
    public $esports = [];
    public function getMyTeam()
    {
        $user = Auth::user();
        if ($user->esport_team_id) {
            $this->team = $user->esportTeam;
            $this->isFounder = true;

        } else {
            $team_id = Member::where('user_id', $user->id)->first()->esport_team_id;
            $this->team = EsportTeam::find($team_id);
        }
        $this->members = $this->team->members;


    }
    public function getPosts()
    {
        $this->posts = $this->team->posts;
    }
    public function getEsports()
    {
        $this->esports = Esport::all();
    }
    public function render()
    {
        $this->getMyTeam();
        $this->getPosts();
        $this->getEsports();
        return view('livewire.profile.my-team');
    }
}