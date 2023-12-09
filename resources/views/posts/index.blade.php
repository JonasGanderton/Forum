@extends('app')

@section('title', 'Home page')

@section('content')
    <h3>Viewing all posts:</h3>
    <ul>
        @foreach ($posts as $post)
            {{-- TODO: Make this into a layout that can be repeated --}}
            <li><div class="postListItem">
                <b>{{ $post->title }}</b>
                {{ $post->content }}
            </div></li>
            <br>
        @endforeach
    </ul>
    {{-- Add pagination links --}}
    Current page: {{ $posts->currentPage() }}
    {{ $posts->links() }}
@endsection