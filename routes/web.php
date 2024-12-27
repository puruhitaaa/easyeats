<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\IngredientController;
use App\Livewire\CreatePost;
use App\Livewire\RecipeList;
use App\Livewire\RestaurantList;
use App\Livewire\IngredientList;
use App\Livewire\PostDetail;
use App\Livewire\PostsFeed;
use App\Livewire\Profile\Edit;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', Edit::class)->name('profile.edit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/recipes', RecipeList::class)->name('recipes.index');
Route::get('/restaurants', RestaurantList::class)->name('restaurants.index');
Route::get('/ingredients', IngredientList::class)->name('ingredients.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
Route::get('/posts', PostsFeed::class)->name('posts.index');
Route::get('/posts/{post}', [PostDetail::class, 'post-detail'])->name('posts.show');
