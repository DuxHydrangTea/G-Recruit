<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Facades\App\Models\Apply;
use Facades\App\Ultilities\StatusApply;
class MyTeamApplies extends Component
{
    public $my_team = null;
    public $applyUsers = [];




    public function getMembers()
    {
        $team = auth()->user()->esportTeam;
        if ($team) {
            $this->applyUsers = Apply::whereEsportTeam($team->id)->apply()->waiting()->get();
        }

    }
    public function mount()
    {

    }

    public function render()
    {
        $this->getMembers();

        $this->my_team = auth()->user()->esportTeam;
        return view('livewire.profile.my-team-applies');
    }
}