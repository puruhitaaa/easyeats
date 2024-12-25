<x-section-container title="Latest Ingredients" viewAllRoute="{{ route('ingredients.index') }}">
    @if ($ingredients -> count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($ingredients as $ingredient)
                <div class="border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700 overflow-hidden">
                    <img src="{{ $ingredient->image ? Storage::url($ingredient->image) : 'https://ui-avatars.com/api/?name=' . urlencode($ingredient->name) }}" alt="{{ $ingredient->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">{{ $ingredient->name }}</h3>
                        <p class="text-gray-600">{{ Str::limit($ingredient->description, 100) }}</p>
                        <a href="{{ route('ingredients.show', $ingredient) }}" class="inline-flex items-center text-primary hover:text-primary-dark dark:hover:text-primary-light mt-4">
                            View Ingredient
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 dark:text-gray-400 text-lg py-8">
            No ingredients found.
        </p>
    @endif
</x-section-container>
