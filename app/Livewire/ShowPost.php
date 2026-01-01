<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function delete($post)
    {

        $this->post->delete();

        session()->flash('status', '削除しました。');

        return redirect('/posts');
    }

    public function render()
    {
        return view('livewire.show-post', [
            'post' => $this->post,
        ]);
    }
}
