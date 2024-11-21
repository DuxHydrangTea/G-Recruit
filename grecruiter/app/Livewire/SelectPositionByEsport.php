<?php

namespace App\Livewire;

use App\Models\Esport;
use App\Models\Position;
use App\Models\Topic;
use Livewire\Component;

class SelectPositionByEsport extends Component
{
    public $esports;
    public $positions;
    public $topics;
    public $currentEsport;

    public function updateCurrentEsport($value)
    {
        $this->currentEsport = $value;
    }
    public function mount()
    {
        $this->esports = Esport::all();
        $this->positions = Position::all();
        $this->topics = Topic::all();
    }
    public function render()
    {
        return view('livewire.select-position-by-esport');
    }
}