<div class="relative">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if($posts->isEmpty())
            <div class="py-4 text-center">
                <p>No posts found.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($posts as $post)
                    <livewire:post-card :post="$post" :wire:key="$post->id" />
                @endforeach
            </div>

            @if($hasMorePages)
                <div
                    x-data
                    x-intersect="$wire.loadMore()"
                    class="flex items-center justify-center w-full h-8"
                >
                    <div class="w-6 h-6 border-4 border-blue-500 rounded-full animate-spin border-t-transparent"></div>
                </div>
            @endif
        @endif

        <x-modal name="create-post">
            <livewire:create-post />
        </x-modal>
    </div>

    <div class="fixed bottom-4 right-4">
        @auth
            <x-button
                x-data
                @click="$dispatch('open-modal', 'create-post')"
                class="p-4 font-medium text-white bg-blue-600 rounded-md"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </x-button>
        @else
            <a href="{{ route('login') }}" class="p-4 font-medium text-white bg-blue-600 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        @endauth
    </div>
</div>
