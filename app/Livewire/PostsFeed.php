<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PostsFeed extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $hasMorePages = true;

    protected $listeners = [
        'postCreated' => '$refresh',
        'postDeleted' => '$refresh',
        'commentAdded' => '$refresh'
    ];

    public function loadMore()
    {
        $this->perPage += 10;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $posts = Post::with(['user', 'likes', 'comments' => function($query) {
            $query->whereNull('parent_id')
                  ->latest()
                  ->limit(1);
        }])
        ->latest()
        ->paginate($this->perPage);

        $this->hasMorePages = $posts->hasMorePages();

        return view('livewire.posts-feed', [
            'posts' => $posts
        ]);
    }
}
