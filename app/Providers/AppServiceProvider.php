<?php

namespace App\Providers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Restaurant;
use App\Observers\IngredientObserver;
use App\Observers\RecipeObserver;
use App\Observers\RestaurantObserver;
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
    }
}
