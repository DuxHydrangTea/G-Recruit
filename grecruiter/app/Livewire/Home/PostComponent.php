<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $posts = [];
    public function mount()
    {
        $this->posts = Post::public()->limit(6)->get();
    }
    public function render()
    {
        return view('livewire.home.post-component');
    }
}