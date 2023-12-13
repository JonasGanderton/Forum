<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the UserAccount that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function UserAccount()
    {
        return $this->belongsTo(UserAccount::class);
    }

    /**
     * Get the parent commentable model (post or comment).
     * 
     * @return MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the comment's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the Post from the beginning of this comment thread.
     * 
     * @return Post
     */
    function originalPost() : Post
    {
        $parent = $this->commentable;
        while ($parent::class == Comment::class)
        {
            $parent = $parent->commentable;
        }
        return $parent;
    }
}
