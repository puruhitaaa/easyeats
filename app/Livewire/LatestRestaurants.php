<?php

namespace App\Livewire;

use App\Models\Restaurant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LatestRestaurants extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $restaurants = Restaurant::latest()->take(3)->get();
        return view('livewire.latest-restaurants', compact('restaurants'));
    }
}
