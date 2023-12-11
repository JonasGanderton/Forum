@extends('app')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <p>Title:         <input type="text" name="title"         value="{{ old('title') }}"        ></p>
        <p>Content:       <input type="text" name="content"       value="{{ old('content') }}"      ></p>
        {{-- TODO: Add tags. --}}
        <input type="submit" value="Submit">

        <a href="{{ route('home') }}">Cancel</a>
@endsection