<div class="space-y-2">
    <div class="flex space-x-3">
        <img src="{{ $comment->user->image }}" class="h-8 w-8 rounded-full object-cover">
        <div class="flex-1">
            <div class="bg-gray-100 rounded-lg p-3">
                <p class="font-semibold text-sm">{{ $comment->user->name }}</p>
                <p class="text-sm">{{ $comment->content }}</p>
            </div>

            <div class="flex items-center space-x-4 mt-1 text-sm">
                <button wire:click="like" class="{{ $comment->likes->contains('user_id', auth()->id()) ? 'text-blue-500' : 'text-gray-500' }}">
                    Like ({{ $comment->likes->count() }})
                </button>
                <button wire:click="$toggle('showReplies')" class="text-gray-500">
                    Reply ({{ $comment->replies->count() }})
                </button>
                <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            @if($showReplies)
                <div class="mt-2 space-y-2">
                    @foreach($comment->replies as $reply)
                        <div class="flex space-x-3 ml-6">
                            <img src="{{ $reply->user->image }}" class="h-8 w-8 rounded-full object-cover">
                            <div class="flex-1">
                                <div class="bg-gray-100 rounded-lg p-3">
                                    <p class="font-semibold text-sm">{{ $reply->user->name }}</p>
                                    <p class="text-sm">{{ $reply->content }}</p>
                                </div>
                                <p class="text-gray-400 text-xs mt-1">{{ $reply->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach

                    <form wire:submit.prevent="addReply" class="ml-6 mt-2">
                        <input
                            type="text"
                            wire:model="replyContent"
                            placeholder="Write a reply..."
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 text-sm"
                        >
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
