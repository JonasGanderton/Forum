@extends('app')

{{-- TODO: test an invalid title (i.e. attack) --}}
@section('title', $userAccount->username )

@section('content')
    <h3>Viewing all posts by <i>{{ $userAccount->username }}</i></h3>
    @include('posts.list', $posts=$userAccount->posts->sortByDesc('posted_at'))
@endsection