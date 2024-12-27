<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentCard extends Component
{
    public Comment $comment;
    public $replyContent = '';
    public $showReplies = false;
    public $replies = [];
    public $perPage = 5;
    public $hasMoreReplies = false;
    public $loadingReplies = false;
    public $editingCommentId = null;
    public $editedContent = '';

    public function mount()
    {
        if ($this->showReplies) {
            $this->loadReplies();
        }
    }

    public function startEditing($commentId, $content)
    {
        $this->editingCommentId = $commentId;
        $this->editedContent = $content;
    }

    public function cancelEditing()
    {
        $this->editingCommentId = null;
        $this->editedContent = '';
    }

    public function updateComment($commentId)
    {
        $this->validate([
            'editedContent' => 'required|min:1'
        ]);

        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== auth()->id()) {
            return;
        }

        $comment->update([
            'content' => $this->editedContent
        ]);

        $this->editingCommentId = null;
        $this->editedContent = '';

        if ($comment->parent_id) {
            $this->loadReplies();
        } else {
            $this->comment->refresh();
        }
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== auth()->id()) {
            return;
        }

        $comment->delete();

        if ($comment->parent_id) {
            $this->loadReplies();
        } else {
            $this->dispatch('commentAdded');
        }
    }


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

    public function loadReplies()
    {
        $this->loadingReplies = true;

        $replies = $this->comment->replies()
            ->with(['user', 'likes'])
            ->latest()
            ->take($this->perPage)
            ->get();

        $this->hasMoreReplies = $this->comment->replies()->count() > $this->perPage;
        $this->replies = $replies;

        $this->loadingReplies = false;
    }

    public function loadMoreReplies()
    {
        $this->loadingReplies = true;

        $currentCount = count($this->replies);
        $newReplies = $this->comment->replies()
            ->with(['user', 'likes'])
            ->latest()
            ->skip($currentCount)
            ->take($this->perPage)
            ->get();

        $this->replies = collect($this->replies)->concat($newReplies);
        $this->hasMoreReplies = $this->comment->replies()->count() > count($this->replies);

        $this->loadingReplies = false;
    }

    public function toggleReplies()
    {
        $this->showReplies = !$this->showReplies;
        if ($this->showReplies && empty($this->replies)) {
            $this->loadReplies();
        }
    }

    public function addReply()
    {
        $this->validate([
            'replyContent' => 'required|min:1'
        ]);

        $reply = $this->comment->replies()->create([
            'content' => $this->replyContent,
            'user_id' => auth()->id(),
            'post_id' => $this->comment->post_id
        ]);

        $this->replyContent = '';
        $this->showReplies = true;

        $reply->load(['user', 'likes']);
        $this->replies = collect([$reply])->concat($this->replies);

        $this->dispatch('commentAdded');
    }

    public function render()
    {
        return view('livewire.comment-card');
    }
}
