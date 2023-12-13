<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80rem">
            @if (session('status'))
                <div 
                    x-transition:leave="ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    style="margin-top:-1.45em" 
                    class="mb-4 text-sm text-gray-600 dark:text-gray-400 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 2000)"
                    >{{ session('status') }}
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                    {{ $post->title }}
                </h2>
                <p style="white-space:pre-wrap" class="mt-1 text-m text-gray-900 dark:text-gray-100">{{ $post->content }}</p>
                @include('posts.userInfo', $post)
                @include('tags.show', $tags=$post->tags)
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <span class="mt-1 text-m text-gray-900 dark:text-gray-100" style="float:right">
                    @include('comments.count', $post)
                </span>
                
                {{-- Show comment buttons if logged in --}}
                @auth
                    <button onclick="showReplyBox(0)" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">Add comment</button>
                    <span id=0 style="display:none">
                        @livewire('create-comment', ['post' => $post, 'parent' => $post])
                    </span>
                @else
                    <span class="text-sm text-gray-600 dark:text-gray-400">Log in to comment</span>
                @endauth
                <br>
                @include('comments.nestedComment', $commentable=$post)
                @livewireScripts
                    <script>
                        function showReplyBox(id) {
                            var x = document.getElementById(id);
                            if (x.style.display === "none") {
                                x.style.display = "block"
                            } else {
                                x.style.display = "none"
                            }
                        }
                    </script>
                @livewireScripts
            </div>
        </div>
    </div>
</x-app-layout>
