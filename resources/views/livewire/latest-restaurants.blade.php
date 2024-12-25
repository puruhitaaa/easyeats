<x-section-container title="Featured Restaurants" viewAllRoute="{{ route('restaurants.index') }}">
    @if($restaurants -> count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($restaurants as $restaurant)
                <div class="border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700 overflow-hidden">
                    <img src="{{ $restaurant->image ? url('storage/' . $restaurant->image) : 'https://ui-avatars.com/api/?name=' . urlencode($restaurant->name) }}" alt="{{ $restaurant->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">{{ $restaurant->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($restaurant->description, 100) }}</p>
                        <div class="text-sm text-gray-500">
                            <p>{{ $restaurant->address }}</p>
                            <p>{{ $restaurant->phone }}</p>
                        </div>
                        <a href="{{ route('restaurants.show', $restaurant) }}" class="inline-flex items-center text-primary hover:text-primary-dark dark:hover:text-primary-light mt-4">
                            View Restaurant
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
