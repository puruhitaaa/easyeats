<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }//
}
