<?php

namespace App\Observers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeObserver
{
    /**
     * Handle the Recipe "created" event.
     */
    public function created(Recipe $recipe): void
    {
        //
    }

    /**
     * Handle the Recipe "updated" event.
     */
    public function updated(Recipe $recipe): void
    {
        //
    }

    /**
     * Handle the Recipe "deleted" event.
     */
    public function deleted(Recipe $recipe): void
    {
        if ($recipe->image) {
            Storage::disk('public')->delete('recipes/' . $recipe->image);
        }
    }

    /**
     * Handle the Recipe "restored" event.
     */
    public function restored(Recipe $recipe): void
    {
        //
    }

    /**
     * Handle the Recipe "force deleted" event.
     */
    public function forceDeleted(Recipe $recipe): void
    {
        //
    }
}
