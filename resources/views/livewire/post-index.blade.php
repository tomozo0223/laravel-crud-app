<div>
    <flux:heading size="xl" lebel="1">投稿一覧ページ</flux:heading>

    <div class="w-full max-w-[960px] m-auto">
        <div class="mt-4 w-full">
            <flux:button href="{{ route('posts.create') }}" variant="primary" color="blue">新規投稿</flux:button>
        </div>

        @if (session('status'))
            <div class="w-[960px] m-auto max-full bg-white shadow-md rounded-lg p-4 mb-4 mt-8 border">
                <span class="text-red-400 bg-white p-1 w-full block rounded-md">{{ session('status') }}</span>
            </div>
        @endif

        @foreach ($posts as $post)
            <div class="max-full bg-white shadow-md rounded-lg p-4 mb-4 mt-8 border">
                <div class="flex justify-between border-b-2">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h2>
                    </a>
                    <p class="text-gray-400">投稿者：{{ $post->user->name }}</p>
                </div>
                <p class="text-gray-700 mb-4 mt-2">{{ $post->body }}</p>

                <div class="text-right text-sm text-gray-500">
                    投稿日：{{ $post->created_at->format('Y-m-d H:i') }}
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</div>
