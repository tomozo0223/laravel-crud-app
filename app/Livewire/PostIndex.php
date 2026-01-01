<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public function render()
    {
        $posts = Post::with('user')->latest()->get();

        return view('livewire.post-index', [
            'posts' => $posts,
        ]);
    }
}
