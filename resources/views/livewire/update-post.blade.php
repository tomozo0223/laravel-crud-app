<div>
    <flux:heading size="xl" lebel="1">投稿編集ページ</flux:heading>

    <div class="w-3xl m-auto">
        @if (session('status'))
            <span class="text-blue-400 bg-white p-1 w-full block rounded-md">{{ session('status') }}</span>
        @endif
        {{-- フォーム --}}
        <form wire:submit="update">
            <div class="w-3xl mt-4">
                <input type="text" wire:model="title" placeholder="タイトルを入力してください" class="w-full border-1 rounded-md p-2"
                    value="{{ $post->title }}">
                @error('title')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-3xl mt-4">
                <textarea wire:model="body" placeholder="本文を入力してください" class="w-full border-1 rounded-md p-2">{{ $post->body }}</textarea>
                @error('body')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-4 gap-2">
                <flux:button href="{{ route('posts') }}" variant="primary" color="blue">一覧に戻る</flux:button>
                <div>
                    <flux:button type="submit" variant="primary" class="bg-green-400">編集</flux:button>
                </div>
            </div>
        </form>
    </div>
</div>
