@extends('app')

@section('title', 'Home page')

@section('content')
    <h3>Viewing all posts:</h3>
    <ul>
        @foreach ($posts as $post)
            {{-- <li>  --}}
            @include('posts.linkedPostInline', $post)
            {{-- </li> --}}
            <br>
        @endforeach
    </ul>

    {{-- Add pagination links --}}
    Current page: {{ $posts->currentPage() }}
    {{ $posts->links() }}
@endsection