@extends('app')

{{-- TODO: test an invalid title (i.e. attack) --}}
@section('title', $userAccount->username )

@section('content')
    {{-- TODO: Use post list layout, but supply list from this user --}}
    <h3>Viewing all posts by <i>{{ $userAccount->username }}</i></h3>
    <ul>
        @foreach ($userAccount->posts as $post)
            {{-- TODO: Make this into a layout that can be repeated --}}
            <li><div class="postListItem">
                <b>{{ $post->title }}</b>
                {{ $post->content }}
            </div></li>
            <br>
        @endforeach
    </ul>
    <br>
@endsection