<?php

namespace App\Livewire;

use App\Models\Restaurant;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class RestaurantList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    #[Computed]
    public function restaurants()
    {
        return Restaurant::query()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
                      ->orWhereRaw('LOWER(address) LIKE ?', ['%' . strtolower($this->search) . '%']);
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
        return view('livewire.restaurant-list');
    }
}
