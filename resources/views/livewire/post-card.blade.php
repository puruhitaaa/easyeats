<div class="p-4 border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-3">
            <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) }}" class="object-cover w-10 h-10 rounded-full" alt="{{ $post->user->name }}">
            <div>
                <h3 class="font-semibold">{{ $post->user->name }}</h3>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="relative" x-data="{ open: false, copyLink() {
    const url = `${window.location.origin}/posts/{{{ $post->id }}}`;
    navigator.clipboard.writeText(url).then(() => {
        window.dispatchEvent(new CustomEvent('toast', {
            detail: {
                type: 'success',
                message: 'Post link copied to clipboard!'
            }
        }));
    }).catch(() => {
        window.dispatchEvent(new CustomEvent('toast', {
            detail: {
                type: 'error',
                message: 'Failed to copy link'
            }
        }));
    });
} }">
            <button
                @click="open = !open"
                @click.outside="open = false"
                class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </button>

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-50 mt-2 border rounded-md shadow-md w-36 bg-background-light dark:bg-background-dark dark:border-gray-700 ring-1 ring-black ring-opacity-5"
            >
            <div class="py-1">
                @if($post->user_id === auth()->id())
                    <button @click="$dispatch('open-modal', 'edit-post-{{ $post->id }}')" class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                        </svg>
                        Update Post
                    </button>
                    <button
                        wire:click="deletePost({{ $post->id }})"
                        class="flex items-center w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete Post
                    </button>
                @endif
                <button
                    @click="copyLink()"
                    class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    Copy Link
                </button>
            </div>
            </div>
        </div>
    </div>

    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/500x320?text=Post+Image' }}" class="w-full h-[44rem] object-cover rounded-lg mb-4" alt="{{ $post->id }}">

    <p class="mb-4 text-text-light dark:text-text-dark">{{ $post->content }}</p>

    <div class="flex items-center pt-4 space-x-4 border-t">
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
            @click="$dispatch('open-modal', 'post-detail-{{ $post->id }}'); $dispatch('set-post', { id: {{ $post->id }} })"
            class="flex items-center space-x-2 text-gray-500"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
            </svg>
            <span>{{ $commentCount }}</span>
        </button>
    </div>

    @if($post->comments->count() > 0)
        <div class="pt-4 mt-4 border-t">
            <livewire:comment-card :comment="$post->comments->first()" :wire:key="$post->comments->first()->id" />

            @if($post->comments->count() > 1)
                <button
                    x-data
                    @click="$dispatch('open-modal', 'post-detail'); $dispatch('set-post', { id: {{ $post->id }} })"
                    class="mt-2 text-sm text-blue-500"
                >
                    View all {{ $commentCount }} comments
                </button>
            @endif
        </div>
    @endif
    <x-modal name="post-detail-{{ $post->id }}" max-width="7xl">
        <livewire:post-detail :post="$post" :key="'post-detail-'.$post->id" />
    </x-modal>
    <x-modal name="edit-post-{{ $post->id }}">
        <livewire:update-post :post="$post" :key="'edit-post-'.$post->id" />
    </x-modal>
</div>
