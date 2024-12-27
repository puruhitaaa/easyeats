<?php

namespace App\Providers;

use App\Models\Ingredient;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Restaurant;
use App\Models\User;
use App\Observers\IngredientObserver;
use App\Observers\PostObserver;
use App\Observers\RecipeObserver;
use App\Observers\RestaurantObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Recipe::observe(RecipeObserver::class);
        Restaurant::observe(RestaurantObserver::class);
        Ingredient::observe(IngredientObserver::class);
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
    }
}
