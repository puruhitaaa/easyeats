<div>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4">
            @auth
                <x-button
                    x-data
                    @click="$dispatch('open-modal', 'create-post')"
                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md"
                >
                    Create Post
                </x-button>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md">
                    Create Post
                </a>
            @endauth
        </div>

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

    {{-- <x-modal name="post-detail">
        <livewire:post-detail />
    </x-modal> --}}
</div>
