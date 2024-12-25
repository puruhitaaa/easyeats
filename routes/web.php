<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\IngredientController;
use App\Livewire\RecipeList;
use App\Livewire\RestaurantList;
use App\Livewire\IngredientList;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', RecipeList::class)->name('recipes.index');
Route::get('/restaurants', RestaurantList::class)->name('restaurants.index');
Route::get('/ingredients', IngredientList::class)->name('ingredients.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
