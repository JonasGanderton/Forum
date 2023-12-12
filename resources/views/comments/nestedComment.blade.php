@foreach ($commentable->comments as $c)
    <div class="border p-2 mt-2 ml-4 bg-white dark:bg-gray-800 sm:rounded-lg text-m text-gray-900 dark:text-gray-100">
        {{ $c->content }}
        <p class="text-sm text-gray-600 dark:text-gray-400">
            <i><a href="{{ route('users.show', ['username' => $c->userAccount->username]) }}" class="hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                {{ $c->userAccount->username }}
            </a></i> at <i>{{ $c->posted_at}}</i>
        </p>
        @if ($c->comments)
            @include('comments.nestedComment', $commentable=$c)
        @endif
    </div>
@endforeach