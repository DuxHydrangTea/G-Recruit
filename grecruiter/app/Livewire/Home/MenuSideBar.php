<?php

namespace App\Livewire\Home;

use App\Models\Esport;
use App\Repositories\MenuRepositoryInterface;
use Livewire\Component;
use App\Models\Menu;
class MenuSideBar extends Component
{

    public $menus = [];
    public $esports = [];
    public $orderSelect = 1;
    public function updateSeletion($id)
    {
        $this->orderSelect = $id;
    }
    public function render()
    {
        $this->esports = Esport::all();
        $mType1 = Menu::get()->where('type', 1)->all();
        //dd($menus);
        $mType2 = Menu::get()->where('type', 2)->all();
        $this->menus = compact(['mType1', 'mType2']);
        return view('livewire.home.menu-side-bar')->with('menus', $this->menus);
    }
}