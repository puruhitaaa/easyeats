<div>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-6">
            <div class="relative">
                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Search ingredients..."
                    class="w-full pl-12 pr-4 py-3 text-base rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm
                    bg-white dark:bg-background-dark text-text-light dark:text-text-dark
                    placeholder-gray-400 dark:placeholder-gray-500
                    focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary
                    transition-colors duration-200"
                >
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        @if($this->ingredients->count() > 0)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($this->ingredients as $ingredient)
                    <div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
                        <div class="p-6">
                            <div class="relative w-full h-48 overflow-hidden bg-center bg-cover">
                                <img class="object-cover w-full h-full transition-transform ease-out group-hover:scale-105"
                                    src="{{ $ingredient->image ? asset('storage/' . $ingredient->image) : 'https://ui-avatars.com/api/?name=' . urlencode($ingredient->name) }}"
                                    alt="{{ $ingredient->name }}"
                                />
                            </div>
                            <h3 class="mt-4 text-xl font-semibold text-text-light dark:text-text-dark">{{ $ingredient->name }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ Str::limit($ingredient->description, 150) }}</p>
                            <div class="mt-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    Unit: {{ $ingredient->unit }}
                                </span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('ingredients.show', $ingredient) }}" class="inline-flex items-center text-primary hover:text-primary-dark dark:hover:text-primary-light">
                                    View Ingredient
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($this->ingredients->hasMorePages())
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
                No ingredients found.
            </p>
        @endif
    </div>
</div>
