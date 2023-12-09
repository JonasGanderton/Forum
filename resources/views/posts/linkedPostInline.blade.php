<div class="postListItem">
    <a href="{{ route('posts.show', ['post' =>$post]) }}">
        <b>{{ $post->title }}</b>
        {{ $post->content }}
    </a>
</div>
