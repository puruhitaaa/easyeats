<?php

namespace App\Observers;

use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class IngredientObserver
{
    /**
     * Handle the Ingredient "created" event.
     */
    public function created(Ingredient $ingredient): void
    {
        //
    }

    /**
     * Handle the Ingredient "updated" event.
     */
    public function updated(Ingredient $ingredient): void
    {
        //
    }

    /**
     * Handle the Ingredient "deleted" event.
     */
    public function deleted(Ingredient $ingredient): void
    {
        if ($ingredient->image) {
            Storage::disk('public')->delete('ingredients/' . $ingredient->image);
        }
    }

    /**
     * Handle the Ingredient "restored" event.
     */
    public function restored(Ingredient $ingredient): void
    {
        //
    }

    /**
     * Handle the Ingredient "force deleted" event.
     */
    public function forceDeleted(Ingredient $ingredient): void
    {
        //
    }
}
