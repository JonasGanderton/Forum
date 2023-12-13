<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
    {{ __('Comments') }}
</h2>
@foreach ($comments as $c)
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            <a href="{{ route('posts.show', ['post' => $c->originalPost()]) }}">
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Comment on post by <i>{{ $c->originalPost()->userAccount->username }}</i>:
                    <i> {{ $c->originalPost()->title }} </i>
                </p>
                <p style="white-space:pre-wrap" class="mt-1 text-m text-gray-900 dark:text-gray-100">{{ $c->content }}</p>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400"><i>{{ $c->posted_at}}</i></p>
            </a>
        </div>
    </div>
@endforeach