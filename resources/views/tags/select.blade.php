@foreach (App\Models\Tag::get() as $tag)
    <x-secondary-button-compact>
        @if ($tag->id == 1)
            <input type="checkbox" name='{{ $tag->name }}' id={{ $tag->name }} checked>
        @else
            <input type="checkbox" name='{{ $tag->name }}' id={{ $tag->name }}>
        @endif
        <label for={{ $tag->name }}>
            &nbsp;
            {{ $tag->name }}
        </label>
    </x-secondary-button-compact>
    &nbsp;
@endforeach