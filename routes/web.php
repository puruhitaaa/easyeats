<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\IngredientController;
use App\Livewire\RecipeList;
use App\Livewire\RestaurantList;
use App\Livewire\IngredientList;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/recipes', RecipeList::class)->name('recipes.index');
Route::get('/restaurants', RestaurantList::class)->name('restaurants.index');
Route::get('/ingredients', IngredientList::class)->name('ingredients.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
