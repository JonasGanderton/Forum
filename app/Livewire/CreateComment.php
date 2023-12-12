<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CreateComment extends Component
{ 
    public $commentable_id;
    public $commentable_type;
    public $content = '';
    public $parent;
    public $post;
 
    public function save()
    {
        $this->commentable_type = $this->parent::class;
        $this->commentable_id = $this->parent->id;

        Comment::factory()->create([
            'content' => $this->content,
            'posted_at' => now(),
            'user_account_id' => Auth::authenticate()->userAccount->id,
            'commentable_id' => $this->commentable_id,
            'commentable_type' => $this->commentable_type,
        ]);

        $this->content = '';

        // TODO: Get this to refresh without full redirect - may need to convert view to Livewire.

        // return view('livewire.create-comment'); 
        return redirect()->route('posts.show', ['post' => $this->post])->with(['status', 'post-created']);
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
