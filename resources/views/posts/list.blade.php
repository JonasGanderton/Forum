@foreach ($posts as $post)
    @include('posts.linkedPostInline', $post)
    <br>
@endforeach