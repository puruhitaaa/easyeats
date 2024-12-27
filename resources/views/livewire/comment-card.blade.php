<div class="space-y-2">
    <div class="flex space-x-3">
        <img src="{{ asset('storage/' . $comment->user->image) }}" class="object-cover w-8 h-8 rounded-full">
        <div class="flex-1">
            <div class="p-3 border rounded-lg shadow-md bg-background-light dark:bg-background-dark dark:border-gray-700">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold">{{ $comment->user->name }}</p>

                    @if($comment->user_id === auth()->id())
                        <div class="relative" x-data="{ open: false }">
                            <button
                                @click="open = !open"
                                @click.outside="open = false"
                                class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                                    <button
                                        wire:click="startEditing({{ $comment->id }}, '{{ $comment->content }}')"
                                        class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button
                                        wire:click="deleteComment({{ $comment->id }})"
                                        class="flex items-center w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if($editingCommentId === $comment->id)
                    <div class="space-y-2">
                        <textarea
                            wire:model="editedContent"
                            class="w-full p-2 text-sm placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm min-h-20 max-h-40 rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                            rows="2"
                        ></textarea>
                        <div class="flex justify-end space-x-2">
                            <button
                                wire:click="cancelEditing"
                                class="p-2 text-sm placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                            >
                                Cancel
                            </button>
                            <button
                                wire:click="updateComment({{ $comment->id }})"
                                class="p-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                @else
                    <p class="text-sm">{{ $comment->content }}</p>
                @endif
            </div>

            <div class="flex items-center mt-1 space-x-4 text-sm">
                <button wire:click="like" class="{{ $comment->likes->contains('user_id', auth()->id()) ? 'text-blue-500' : 'text-gray-500' }}">
                    Like ({{ $comment->likes->count() }})
                </button>
                <button wire:click="toggleReplies" class="text-gray-500">
                    Reply ({{ $comment->replies()->count() }})
                </button>
                <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            @if($showReplies)
                <div class="mt-2 space-y-2">
                    @foreach($replies as $reply)
                        <div class="flex ml-6 space-x-3">
                            <img src="{{ asset('storage/' . $reply->user->image) }}" class="object-cover w-8 h-8 rounded-full">
                            <div class="flex-1">
                                <div class="p-3 overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-sm font-semibold">{{ $reply->user->name }}</p>

                                        @if($reply->user_id === auth()->id())
                                            <div class="relative" x-data="{ open: false }">
                                                <button
                                                    @click="open = !open"
                                                    @click.outside="open = false"
                                                    class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                                                        <button
                                                            wire:click="startEditing({{ $reply->id }}, '{{ $reply->content }}')"
                                                            class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                        <button
                                                            wire:click="deleteComment({{ $reply->id }})"
                                                            class="flex items-center w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if($editingCommentId === $reply->id)
                                        <div class="space-y-2">
                                            <textarea
                                                wire:model="editedContent"
                                                class="w-full p-2 text-sm placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm min-h-20 max-h-40 rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                                                rows="2"
                                            ></textarea>
                                            <div class="flex justify-end space-x-2">
                                                <button
                                                    wire:click="cancelEditing"
                                                    class="px-3 py-1 text-sm text-gray-600 border rounded-lg hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700"
                                                >
                                                    Cancel
                                                </button>
                                                <button
                                                    wire:click="updateComment({{ $reply->id }})"
                                                    class="px-3 py-1 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                                                >
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-sm">{{ $reply->content }}</p>
                                    @endif
                                </div>
                                <p class="mt-1 text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach

                    <form wire:submit.prevent="addReply" class="flex items-center mt-2 ml-6 space-x-3">
                        <input
                            type="text"
                            wire:model="replyContent"
                            placeholder="Write a reply..."
                            class="w-full p-2 text-sm placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                        >
                        <x-button type="submit" class="border rounded-lg text-text-light dark:text-text-dark bg-background-light dark:bg-background-dark dark:border-gray-700">
                            Reply
                        </x-button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
