<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;

use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

class RecipeList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    #[Computed]
    public function recipes()
    {
        return Recipe::query()
            ->with(['ingredients'])
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('name', 'ilike', '%' . $this->search . '%')
                    ->orWhere('description', 'ilike', '%' . $this->search . '%');
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
        return view('livewire.recipe-list');
    }
}
