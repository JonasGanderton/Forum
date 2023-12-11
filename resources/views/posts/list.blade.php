@foreach ($posts as $post)
    @include('posts.linkedPostInline', $post)
@endforeach