<x-section-container title="Latest Recipes" viewAllRoute="{{ route('recipes.index') }}">
    @if ($recipes -> count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($recipes as $recipe)
                <div class="border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700 overflow-hidden">
                    <img src="{{ $recipe->image ? url('storage/' . $recipe->image) : 'https://ui-avatars.com/api/?name=' . urlencode($recipe->name) }}" alt="{{ $recipe->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">{{ $recipe->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($recipe->description, 100) }}</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>By {{ $recipe->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $recipe->cooking_time }} mins</span>
                        </div>
                        <a href="{{ route('recipes.show', $recipe) }}" class="inline-flex items-center text-primary hover:text-primary-dark dark:hover:text-primary-light mt-4">
                            View Recipe
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
            No recipes found.
        </p>
    @endif
</x-section-container>
