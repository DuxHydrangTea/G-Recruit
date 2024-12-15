<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Esport;
class OtherTeam extends Component
{
    public $id = 0; // id of user

    public $team = null;
    public $esports = null;
    public $members = [];
    public $posts = [];
    public function getTeam()
    {
        $user = User::find($this->id);
        $this->team = $user->getTeamBelong();
        if ($this->team) {
            $this->members = $this->team->members;
            $this->posts = $this->team->posts;
        }

    }
    public function getEsports()
    {
        $this->esports = Esport::all();
    }
    public function render()
    {
        $this->getTeam();
        $this->getEsports();
        return view('livewire.profile.other-team');
    }
}