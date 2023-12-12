@if ($post->comment_count() == 1)
    {{ $post->comment_count() }} comment
@else
    {{ $post->comment_count() }} comments
@endif