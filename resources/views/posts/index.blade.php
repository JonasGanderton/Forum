@extends('app')

@section('title', 'Home page')

@section('content')
    <h3>Viewing all posts:</h3>
    @include('posts.list', $posts)
    {{-- Add pagination links --}}
    Current page: {{ $posts->currentPage() }}
    {{ $posts->links() }}
@endsection