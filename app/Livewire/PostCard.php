<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCard extends Component
{
    public Post $post;

    public function like()
    {
        if (!auth()->user()) return;

        $like = $this->post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        } else {
            $this->post->likes()->create(['user_id' => auth()->id()]);
        }

        $this->post->refresh();
    }

    public function deletePost(int $postId)
    {
        Post::findOrFail($postId)->delete();
        $this->dispatch('postDeleted');
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
