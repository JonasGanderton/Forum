<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Get the UserAccount that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class);
    }

    /**
     * The Tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
  
    /**
     * Get all of the post's comments.
     * 
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Count total comments on the post.
     * 
     * @return Integer
     */
    public function comment_count()
    {
        $sum = 0;
        foreach ($this->comments as $comment) {
            $sum += 1 + $this->comment_count_recurse($comment);
        }
        return $sum;
    }

    /**
     * Recursively counts comments on comments.
     * 
     * @return Integer
     */
    private function comment_count_recurse(Comment $comment)
    {
        $sum = 0;
        foreach ($comment->comments as $child_comment) {
            $sum += 1 + $this->comment_count_recurse($child_comment);
        }
        return $sum;
    }
}
