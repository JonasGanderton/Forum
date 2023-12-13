<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
    <a href="{{ route('posts.show', ['post' =>$post]) }}">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $post->title }}
        </h2>
        
        <p style="white-space:pre-wrap" class="mt-1 text-m text-gray-900 dark:text-gray-100">{{ $post->content }}</p>
        @include('posts.userInfo', $post)
        <div class="mt-1 text-m text-gray-900 dark:text-gray-100">
            @include('comments.count', $post)
            &nbsp;
            @include('tags.show', $tags=$post->tags)
        </div>
    </a>
    </div>
</div>