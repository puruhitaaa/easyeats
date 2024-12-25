@props(['title', 'viewAllRoute'])

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-text-light dark:text-text-dark">{{ $title }}</h2>
            <a href="{{ $viewAllRoute }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark">
                View All
            </a>
        </div>
        {{ $slot }}
    </div>
</section>
