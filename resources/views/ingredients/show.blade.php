@extends('layouts.app')

@section('content')
<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
            <div class="p-8">
                <div class="w-full h-96 relative">
                    <img class="w-full h-full object-cover"
                        src="{{ $ingredient->image ? asset('storage/' . $ingredient->image) : 'https://ui-avatars.com/api/?name=' . urlencode($ingredient->name) }}"
                        alt="{{ $ingredient->name }}" />
                </div>

                <h1 class="text-3xl mt-6 font-bold text-text-light dark:text-text-dark">{{ $ingredient->name }}</h1>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Description</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $ingredient->description }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Unit</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $ingredient->unit }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
