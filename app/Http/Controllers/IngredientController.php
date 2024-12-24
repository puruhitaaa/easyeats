<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show', compact('ingredient'));
    }//
}
