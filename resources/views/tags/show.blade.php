@foreach ($tags as $tag)
    <x-secondary-button-compact>
        <a href="{{ route('posts.tag', ['tagName' => $tag->name]) }}">
            {{ $tag->name }}
        </a>
    </x-secondary-button-compact>
@endforeach