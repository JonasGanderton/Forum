<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80rem">
            @if (session('status') === 'post-created')
                <div 
                    x-transition:leave="ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    style="margin-top:-1.45em" 
                    class="mb-4 text-sm text-gray-600 dark:text-gray-400 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 500)"
                    >{{ __('Post created.') }}
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                    {{ $post->title }}
                </h2>
                <p class="mt-1 text-m text-gray-900 dark:text-gray-100">
                    {{ $post->content }}
                </p>
                @include('posts.userInfo', $post)
                @include('tags.show', $tags=$post->tags)
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <p class="mt-1 text-m text-gray-900 dark:text-gray-100">
                    @include('comments.count', $post)
                </p>
                <br>
                @include('comments.nestedComment', $commentable=$post)
            </div>
        </div>
    </div>
</x-app-layout>
