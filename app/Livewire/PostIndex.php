<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public function delete($id)
    {
        Post::find($id)->delete();

        session()->flash('status', '削除しました。');

        return redirect('/posts');
    }

    public function render()
    {
        $posts = Post::with('user')->latest()->paginate(10);

        return view('livewire.post-index', [
            'posts' => $posts,
        ]);
    }
}
