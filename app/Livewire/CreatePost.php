<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class CreatePost extends Component
{
    #[Rule('required|min:5')]
    public string $title = '';

    #[Rule('required|min:5')]
    public string $body = '';

    public bool $success = false;

    public function save(){
        $this->validate();
        Post::create(
            $this->all()
        );
        // hi
        $this->success = true; 
        $this->reset('title', 'body'); 
    }
}
