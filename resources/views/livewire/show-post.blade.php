<div>
    <flux:heading size="xl" lebel="1">投稿詳細ページ</flux:heading>


    @if (session('status'))
        <div class="w-[960px] m-auto max-full bg-white shadow-md rounded-lg p-4 mb-4 mt-8 border">
            <span class="text-blue-400 bg-white p-1 w-full block rounded-md">{{ session('status') }}</span>
        </div>
    @endif

    <div class="w-[960px] m-auto max-full bg-white shadow-md rounded-lg p-4 mb-4 mt-8 border">
        <div class="flex justify-between border-b-2">
            <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h2>
            <p class="text-gray-400">投稿者：{{ $post->user->name }}</p>
        </div>
        <p class="text-gray-700 mb-4 mt-2">{{ $post->body }}</p>

        <div class="text-right text-sm text-gray-500">
            投稿日：{{ $post->created_at->format('Y-m-d H:i') }}
        </div>
        <div class="flex justify-end mt-4 gap-2">
            <flux:button href="{{ route('posts.edit', $post->id) }}" variant="primary" color="green">編集
            </flux:button>
            <flux:button variant="danger" wire:click="delete({{ $post->id }})" wire:confirm="本当に削除しますか？">削除
            </flux:button>
        </div>
        <flux:button href="{{ route('posts') }}" variant="primary" color="blue">一覧に戻る</flux:button>
    </div>
</div>
