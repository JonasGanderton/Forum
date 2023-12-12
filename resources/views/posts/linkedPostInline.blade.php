<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
        <a href="{{ route('posts.show', ['post' =>$post]) }}">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $post->title }}
            </h2>
            {{--
                TODO: Truncate content if it's too much for a single 'tile'.
                      Users then have to open the post to read the rest of it.
                TODO: Add comment counter.
            --}}
            <p class="mt-1 text-m text-gray-900 dark:text-gray-100">
                {{ $post->content }}
            </p>
            @include('posts.userInfo', $post)
            <div class="mt-1 text-m text-gray-900 dark:text-gray-100">
                @if ($post->comment_count() == 1)
                    {{ $post->comment_count() }} comment
                @else
                    {{ $post->comment_count() }} comments
                @endif
                &nbsp;
                @include('tags.show', $tags=$post->tags)
            </div>
        </a>
    </div>
</div>