<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;

class CreateComment extends Component
{
    public $post_id;

    public $content = '';

    public $post;

    public function save()
    {
        $this->validate([
            'content' => 'required|min:5',
        ]);
        Comment::create([
            'post_id' => $this->post_id,
            'content' => $this->content,
        ]);

        // $this->redirect('/search-posts');
        // $this->redirectRoute('search-posts');
        session()->flash('message', 'Comment created successfully.');
        $this->redirect(ShowPosts::class);
    }
    public function mount()
    {
        //random post id to test
        $random_post = Post::inRandomOrder()->first();
        $this->post = $random_post;
        $this->post_id = $random_post->id;
    }

    public function render()
    {
        return view('livewire.create-comment');
    }

  
}
