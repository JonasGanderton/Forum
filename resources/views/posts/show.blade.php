@extends('app')

{{-- TODO: test an unsafe title (i.e. attack) --}}
@section('title', $post->title )

@section('content')
    {{-- TODO: Make this into a layout that can be repeated --}}
    <div class="postListItem">
        <p>Posted by
            <i><a href="{{ route('users.show', ['username' => $post->userAccount->username]) }}">
                {{ $post->userAccount->username }}
            </a></i>
            <br><i>{{ $post->posted_at}}</i></p>
        <p>{{ $post->content }}</p>
        <p>Tags:
            @foreach ($post->tags as $tag)
                <span class="main"> {{ $tag->name }}</span>
            @endforeach
        </p>
    </div>
    <br>
@endsection