<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $name;
    public $maxWidth = '2xl';

    public function __construct($name, $maxWidth = '2xl')
    {
        $this->name = $name;
        $this->maxWidth = $maxWidth;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
