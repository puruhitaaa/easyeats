<div class="flex h-[32rem]">
    <div class="w-1/2 bg-black flex items-center justify-center">
        @if($post && $post->image)
            <img alt="{{ $post->id }}" src="{{ asset('storage/' . $post->image) }}" class="max-h-full max-w-full object-contain">
        @endif
    </div>

    <div class="w-1/2 flex flex-col">
        <div class="p-4 border-b">
            <@if(!$post)
                <div class="flex items-center space-x-3">
                    <div class="animate-pulse bg-gray-300 h-full w-full"></div>
            @elseif($post->image)
                    <img alt="{{ $post->id }}"
                        src="{{ asset('storage/' . $post->image) }}"
                        class="max-h-full max-w-full object-contain">
                    <div>
                        <h3 class="font-semibold">{{ $post->user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="mt-4">{{ $post->content }}</p>
            @endif
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="space-y-4 p-4">
                @foreach($comments as $comment)
                    <livewire:comment-card :comment="$comment" :wire:key="$comment->id" />
                @endforeach

                @if($comments->hasMorePages())
                    <div
                        x-data
                        x-intersect="$wire.loadMore()"
                        class="h-8 w-full flex items-center justify-center"
                    >
                        <div class="animate-spin h-6 w-6 border-4 border-blue-500 rounded-full border-t-transparent"></div>
                    </div>
                @endif
            </div>
        </div>

        <div class="p-4 border-t">
            <form wire:submit.prevent="addComment" class="flex space-x-2">
                <input
                    type="text"
                    wire:model="newComment"
                    placeholder="Add a comment..."
                    class="flex-1 rounded-lg border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                >
                <x-button type="submit" class="bg-blue-600 text-white">
                    Post
                </x-button>
            </form>
        </div>
    </div>
</div>
