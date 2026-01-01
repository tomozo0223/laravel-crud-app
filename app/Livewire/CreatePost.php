<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    #[Validate('required', message: 'タイトルは必須です')]
    public $title = '';

    #[Validate('required', message: '本文は必須です')]
    #[Validate('min:10', message: '本文は10文字以上で入力してください')]
    public $body = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id()
        ]);

        session()->flash('status', '投稿できました');

        return $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
