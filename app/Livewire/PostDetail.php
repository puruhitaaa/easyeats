<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public ?Post $post = null;
    public $newComment = '';
    public $perPage = 10;

    protected $listeners = [
        'setPost' => 'setPost',
        'commentAdded' => '$refresh'
    ];

    public function setPost($postId)
    {
        $this->post = Post::findOrFail($postId);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:1'
        ]);

        $this->post->comments()->create([
            'content' => $this->newComment,
            'user_id' => auth()->id()
        ]);

        $this->newComment = '';
        $this->dispatch('commentAdded');
    }

    public function render()
    {
        $comments = collect([]); // Default empty collection
        if (!$this->post) return;

        $comments = $this->post->comments()
            ->with(['user', 'likes', 'replies.user'])
            ->paginate($this->perPage);

        return view('livewire.post-detail', [
            'comments' => $comments
        ]);
    }
}
