<?php

namespace App\Livewire\Profile;

use App\Models\Esport;
use App\Models\EsportTeam;
use App\Models\Member;
use App\Models\Position;
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

    public $topics = [];
    public $positions = [];

    public function getTopics()
    {

        $this->topics = Topic::where('esport_id', $this->team->esport->id)->orderByDesc('user_id')->get();
    }

    public function getPositions()
    {
        $this->positions = Position::positionsOf($this->team->esport_id);
    }
    public function getMyTeam()
    {
        $user = Auth::user();
        if ($user->esport_team_id) {
            $this->team = $user->esportTeam;
            $this->isFounder = true;
            $this->members = $this->team->members;
            $this->getPosts();

        } else {
            $teamMem = Member::where('user_id', $user->id)->first();
            if ($teamMem) {
                $this->team = $teamMem->esportTeam;
                $this->members = $this->team->members;
                $this->getPosts();
            }

        }

    }
    public function getPosts()
    {
        $this->posts = $this->team->posts;
    }
    public function getEsports()
    {
        $this->esports = Esport::all();
    }
    public function getData()
    {
        if (isset($this->team)) {
            $this->getEsports();
            $this->getTopics();
            $this->getPositions();
        }
    }
    public function render()
    {
        $this->getMyTeam();
        $this->getData();
        return view('livewire.profile.my-team');
    }
}