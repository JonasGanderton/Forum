<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\Commented;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CreateComment extends Component
{
    public $content = '';
    public $parent;
    public $post;
 
    public function save()
    {

        $commenter = Auth::authenticate()->userAccount;
        Comment::factory()->create([
            'content' => $this->content,
            'posted_at' => now(),
            'user_account_id' => $commenter->id,
            'commentable_id' => $this->parent->id,
            'commentable_type' => $this->parent::class,
        ]);

        $this->parent->userAccount->user->notify(new Commented($this->post, $commenter->username, $this->content));

        $this->content = '';

        // TODO: Get this to refresh without full redirect - may need to convert view to Livewire.

        // return view('livewire.create-comment'); 
        return redirect()->route('posts.show', ['post' => $this->post])->with('status', 'Comment added!');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
