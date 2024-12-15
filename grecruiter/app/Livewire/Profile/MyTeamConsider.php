<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\Apply;
class MyTeamConsider extends Component
{

    public $my_team = null;
    public $considerUsers = [];

    public function getMembers()
    {
        $team = auth()->user()->esportTeam;
        if ($team) {
            $this->considerUsers = Apply::whereEsportTeam($team->id)->apply()->consider()->get();
        }

    }

    public function render()
    {
        $this->getMembers();
        $this->my_team = auth()->user()->esportTeam;
        return view('livewire.profile.my-team-consider');
    }
}