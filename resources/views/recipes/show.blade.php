@extends('layouts.app')

@section('content')
<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="overflow-hidden border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
            <div class="p-8">
                <div class="w-full h-96 relative">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" />
                </div>

                <h1 class="text-3xl mt-6 font-bold text-text-light dark:text-text-dark">{{ $recipe->name }}</h1>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Description</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $recipe->description }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Instructions</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $recipe->instructions }}</p>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-text-light dark:text-text-dark">Ingredients</h2>
                    <ul class="mt-2 space-y-2">
                        @foreach($recipe->recipe_ingredients as $recipeIngredient)
                            <li class="text-gray-600 dark:text-gray-400">
                                {{ $recipeIngredient->ingredient->name }} -
                                {{ $recipeIngredient->quantity }} {{ $recipeIngredient->ingredient->unit }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
