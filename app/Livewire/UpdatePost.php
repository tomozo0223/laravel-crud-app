<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdatePost extends Component
{
    public Post $post;

    #[Validate('required', message: 'タイトルは必須です')]
    public $title = '';

    #[Validate('required', message: '本文は必須です')]
    #[Validate('min:10', message: '本文は10文字以上で入力してください')]
    public $body = '';

    public function mount(Post $post)
    {
        $this->title = $post->title;
        $this->body = $post->body;
    }

    public function update()
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        session()->flash('status', '編集できました。');

        return redirect()->route('posts.show', $this->post->id);
    }

    public function render()
    {
        return view('livewire.update-post', [
            'post' => $this->post,
        ]);
    }
}
