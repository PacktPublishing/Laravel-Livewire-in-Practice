<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{

    #[Url(except: '', keep: true)]

    public $keyword = '';


    public function render()
    {

        return view('livewire.show-posts', [
            'posts' => Post::filter($this->keyword)->get(),
        ]);
    }
    // public function mount() {
    //     $this->keyword = 'programming';
    // }

    public function showPost($id)
    {
        $this->redirect('/posts/' . $id);
    }
}
