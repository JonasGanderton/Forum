<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80rem">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                    {{ $post->title }}
                </h2>
                <p class="mt-1 text-m text-gray-900 dark:text-gray-100">
                    {{ $post->content }}
                </p>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Posted by<i>
                        <a href="{{ route('users.show', ['username' => $post->userAccount->username]) }}" class="hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        {{ $post->userAccount->username }}
                        </a>
                    </i><br><i>{{ $post->posted_at}}</i>
                </p>
                {{-- TODO: Add links to tags! --}}
                @foreach ($post->tags as $tag)
                    <x-secondary-button-compact>{{ $tag->name }}</x-secondary-button-compact>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
