<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $content = '';
    public $image;

    protected $rules = [
        'content' => 'required|min:3',
        'image' => 'nullable|image|max:1024'
    ];

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
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
