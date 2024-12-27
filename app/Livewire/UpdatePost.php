<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePost extends Component
{
    use WithFileUploads;

    public Post $post;
    public $content;
    public $image;
    public $newImage;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->content = $post->content;
        $this->image = $post->image;
    }

    protected function rules()
    {
        return [
            'content' => 'required|min:3',
            'newImage' => 'nullable|image|max:1024'
        ];
    }

    public function update()
    {
        if (!Auth::check()) {
            throw new AuthorizationException('Unauthorized.');
        }
        $this->validate();

        $this->post->content = $this->content;

        if ($this->newImage) {
            $this->post->image = $this->newImage->store('posts', 'public');
        }

        $this->post->save();

        $this->dispatch('close-modal', 'edit-post-' . $this->post->id);
        $this->dispatch('postUpdated');
        $this->reset('newImage');
    }

    public function deleteImage()
    {
        if (!Auth::check()) {
            throw new AuthorizationException('Unauthorized.');
        }
        if ($this->post->image) {
            $this->post->image = null;
            $this->post->save();
            $this->image = null;
        }
    }

    public function render()
    {
        return view('livewire.update-post');
    }
}
