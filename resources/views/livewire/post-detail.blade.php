<div class="flex h-[90vh]">
    <div class="flex items-center justify-center w-1/2 bg-black">
        @if($post->image)
            <img alt="{{ $post->id }}" src="{{ asset('storage/' . $post->image) }}" class="object-contain max-w-full max-h-full">
        @endif
    </div>

    <div class="flex flex-col w-1/2">
        <div class="p-4 border-b">
            @if(!$post)
                <div class="flex items-center space-x-3">
                    <div class="w-full h-full bg-gray-300 animate-pulse"></div>
                </div>
            @else
                <div class="flex items-center space-x-3">
                    <img
                        src="{{ $post->user->image ? asset('storage/' . $post->user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) }}"
                        class="object-cover w-10 h-10 rounded-full"
                        alt="{{ $post->user->name }}"
                    >
                    <div>
                        <h3 class="font-semibold">{{ $post->user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="mt-4">{{ $post->content }}</p>
            @endif
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="p-4 space-y-4">
                @foreach($comments as $comment)
                    <livewire:comment-card :comment="$comment" :wire:key="$comment->id" />
                @endforeach

                @if($post && method_exists($comments, 'hasMorePages') && $comments->hasMorePages())
                    <div
                        x-data
                        x-intersect="$wire.loadMore()"
                        class="flex items-center justify-center w-full h-8"
                    >
                        <div class="w-6 h-6 border-4 border-blue-500 rounded-full animate-spin border-t-transparent"></div>
                    </div>
                @endif
            </div>
        </div>

        <div class="p-4 border-t">
            <form wire:submit.prevent="addComment" class="flex space-x-2">
                <textarea
                    wire:model="newComment"
                    placeholder="Add a comment..."
                    class="w-full p-2 text-base placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm min-h-20 max-h-40 rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                    rows="2"
                ></textarea>
                <x-button type="submit" class="text-white bg-blue-600 h-fit">
                    Post
                </x-button>
            </form>
        </div>
    </div>
</div>
