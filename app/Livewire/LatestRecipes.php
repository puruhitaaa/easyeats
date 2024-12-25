<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LatestRecipes extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $recipes = Recipe::latest()->take(3)->get();
        return view('livewire.latest-recipes', compact('recipes'));
    }
}
