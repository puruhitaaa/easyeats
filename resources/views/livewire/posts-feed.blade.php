<div>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4">
            <x-button
                x-data
                @click="$dispatch('open-modal', 'create-post')"
                class="bg-blue-600 text-white"
            >
                Create Post
            </x-button>
        </div>

        @if($posts->isEmpty())
            <div class="text-center py-4">
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
                    class="h-8 w-full flex items-center justify-center"
                >
                    <div class="animate-spin h-6 w-6 border-4 border-blue-500 rounded-full border-t-transparent"></div>
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
