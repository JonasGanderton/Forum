<div class="postListItem">
    <a href="{{ route('posts.show', ['post' =>$post]) }}">
        <b>{{ $post->title }}</b>
        {{--
            TODO: Truncate content if it's too much for a single 'tile'.
                  Users then have to open the post to read the rest of it.
            TODO: Add comment counter.
        --}}
        {{ $post->content }}
        <br>
        <span style="font-size:0.8em">
            Posted by <i>{{ $post->userAccount->username }}</i> - {{ $post->posted_at }}
        </span>
    </a>
</div>
