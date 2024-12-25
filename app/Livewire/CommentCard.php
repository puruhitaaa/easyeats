<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentCard extends Component
{
    public Comment $comment;
    public $replyContent = '';
    public $showReplies = false;

    public function like()
    {
        if (!auth()->user()) return;

        $like = $this->comment->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        } else {
            $this->comment->likes()->create(['user_id' => auth()->id()]);
        }

        $this->comment->refresh();
    }

    public function addReply()
    {
        $this->validate([
            'replyContent' => 'required|min:1'
        ]);

        $this->comment->replies()->create([
            'content' => $this->replyContent,
            'user_id' => auth()->id(),
            'post_id' => $this->comment->post_id
        ]);

        $this->replyContent = '';
        $this->showReplies = true;
        $this->dispatch('commentAdded');
    }

    public function render()
    {
        return view('livewire.comment-card');
    }
}
