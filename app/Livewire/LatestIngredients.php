<?php

namespace App\Livewire;

use App\Models\Ingredient;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LatestIngredients extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $ingredients = Ingredient::latest()->take(3)->get();
        return view('livewire.latest-ingredients', compact('ingredients'));
    }
}
