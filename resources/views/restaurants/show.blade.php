@extends('layouts.app')

@section('content')
<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
            <div class="p-8">
                <div class="w-full h-96 relative">
                    <img class="w-full h-full object-cover"
                        src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : 'https://ui-avatars.com/api/?name=' . urlencode($restaurant->name) }}"
                        alt="{{ $restaurant->name }}" />
                </div>

                <h1 class="text-3xl mt-6 font-bold text-text-light dark:text-text-dark">{{ $restaurant->name }}</h1>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Description</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $restaurant->description }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Address</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $restaurant->address }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Phone</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $restaurant->phone }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Email</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $restaurant->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
