<div>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-6">
            <div class="relative">
                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Search restaurants..."
                    class="w-full py-3 pl-12 pr-4 text-base placeholder-gray-400 transition-colors duration-200 bg-white border border-gray-200 shadow-sm rounded-xl dark:border-gray-700 dark:bg-background-dark text-text-light dark:text-text-dark dark:placeholder-gray-500 focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary"
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        @if($this->restaurants->count() > 0)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($this->restaurants as $restaurant)
                    <div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
                        <div class="p-6">
                            <div class="relative w-full h-48 overflow-hidden bg-center bg-cover">
                                <img class="object-cover w-full h-full transition-transform ease-out group-hover:scale-105"
                                    src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : 'https://ui-avatars.com/api/?name=' . urlencode($restaurant->name) }}"
                                    alt="{{ $restaurant->name }}"
                                    />
                            </div>
                            <h3 class="mt-4 text-xl font-semibold text-text-light dark:text-text-dark">{{ $restaurant->name }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ Str::limit($restaurant->description, 150) }}</p>
                            <div class="mt-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    Address: {{ $restaurant->address }}
                                </span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('restaurants.show', $restaurant) }}" class="inline-flex items-center text-primary hover:text-primary-dark dark:hover:text-primary-light">
                                    View Restaurant
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($this->restaurants->hasMorePages())
                <div class="mt-8 text-center">
                    <button
                        wire:click="loadMore"
                        class="px-4 py-2 text-white transition-colors duration-200 ease-in-out rounded-md bg-primary hover:bg-primary-light dark:hover:bg-primary-dark"
                    >
                        Load More
                    </button>
                </div>
            @endif
        @else
            <p class="text-center text-gray-500 dark:text-gray-400 text-lg py-8">
                No restaurants found.
            </p>
        @endif
    </div>
</div>
