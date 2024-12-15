<?php

namespace App\Livewire\Profile;

use App\Models\Position;
use Livewire\Component;
use App\Models\Apply;
class MyTeamInvite extends Component
{
    public $my_team = null;
    public $inviteUsers = [];
    public $positions = [];
    public function getMembers()
    {
        $team = auth()->user()->esportTeam;
        if ($team) {
            $this->inviteUsers = Apply::whereEsportTeam($team->id)->recuit()->get();
        }

    }
    public function getPositions()
    {
        $esport = auth()->user()->getTeamBelong();
        if ($esport) {
            $esport_id = $esport->esport_id;
            $this->positions = Position::where('esport_id', $esport_id)->get();
        }

    }

    public function render()
    {
        $this->getPositions();
        $this->getMembers();
        return view('livewire.profile.my-team-invite');
    }
}