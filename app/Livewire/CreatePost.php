<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Auth\Access\AuthorizationException;

class CreatePost extends Component
{
    use WithFileUploads;

    public $content = '';
    public $image;

    protected $rules = [
        'content' => 'required|min:3',
        'image' => 'nullable|image|max:1024'
    ];

    public function save()
    {
        if (!Auth::check()) {
            throw new AuthorizationException('Unauthorized.');
        }
        $this->validate();

        $post = Post::create([
            'content' => $this->content,
            'user_id' => Auth::id(),
        ]);

        if ($this->image) {
            $post->image = $this->image->store('posts', 'public');
            $post->save();
        }

        $this->dispatch('close-modal', 'create-post');
        $this->dispatch('postCreated');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
