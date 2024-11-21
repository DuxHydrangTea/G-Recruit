<?php

namespace App\Livewire\Home;
use App\Models\User;
use Livewire\Component;

class UserRatest extends Component
{
    public $users = [];


    public function render()
    {
        $this->users = User::all()->where('is_admin', 0);
        return view('livewire.home.user-ratest')->with('users', $this->users);
    }
}