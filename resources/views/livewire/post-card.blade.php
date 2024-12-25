<div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700 p-4">
    <div class="flex items-center space-x-3 mb-4">
        <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) }}" class="h-10 w-10 rounded-full object-cover" alt="{{ $post->user->name }}">
        <div>
            <h3 class="font-semibold">{{ $post->user->name }}</h3>
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/500x320?text=Post+Image' }}" class="w-full h-64 object-cover rounded-lg mb-4" alt="{{ $post->id }}">

    <p class="text-text-light dark:text-text-dark mb-4">{{ $post->content }}</p>

    <div class="flex items-center border-t pt-4 space-x-4">
        <button
            wire:click="like"
            class="flex items-center space-x-2 {{ $post->likes->contains('user_id', auth()->id()) ? 'text-blue-500' : 'text-gray-500' }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            <span>{{ $post->likes->count() }}</span>
        </button>

        <button
            x-data
            @click="$dispatch('open-modal', 'post-detail'); $dispatch('set-post', { id: {{ $post->id }} })"
            class="flex items-center space-x-2 text-gray-500"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
            </svg>
            <span>{{ $post->comments->count() }}</span>
        </button>
    </div>

    @if($post->comments->count() > 0)
        <div class="mt-4 border-t pt-4">
            <livewire:comment-card :comment="$post->comments->first()" :wire:key="$post->comments->first()->id" />

            @if($post->comments->count() > 1)
                <button
                    x-data
                    @click="$dispatch('open-modal', 'post-detail'); $dispatch('set-post', { id: {{ $post->id }} })"
                    class="text-sm text-blue-500 mt-2"
                >
                    View all {{ $post->comments->count() }} comments
                </button>
            @endif
        </div>
    @endif
</div>
