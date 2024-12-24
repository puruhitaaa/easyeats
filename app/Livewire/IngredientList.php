<?php

namespace App\Livewire;

use App\Models\Ingredient;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class IngredientList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    #[Computed()]
    public function ingredients()
    {
        return Ingredient::query()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('name', 'ilike', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.ingredient-list');
    }
}
