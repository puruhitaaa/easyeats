<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    #[Rule('nullable|image|max:1024')]
    public $image;

    #[Rule('required|string|max:255')]
    public $name;

    #[Rule('required|email|max:255')]
    public $email;

    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'image' => 'nullable|image|max:1024',
        ]);

        $user = Auth::user();

        if ($this->image) {
            $imagePath = $this->image->store('user-images', 'public');
            $user->image = $imagePath;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        $this->dispatch('profile-updated');
    }

    public function updatePassword()
    {
        $validated = $this->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|min:6|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);
        $this->dispatch('password-updated');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.profile.edit');
    }
}
