<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $userAccount->username }}
        </h2>
        <p style="white-space:pre-wrap" class="mt-1 text-m text-gray-900 dark:text-gray-100">{{ $userAccount->about }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('posts.list', $posts=$userAccount->posts->sortByDesc('posted_at'))
        </div>
    </div>

    @if (count($userAccount->comments) > 0)
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('comments.list', $comments=$userAccount->comments->sortByDesc('posted_at'))
            </div>
        </div>
    @endif
</x-app-layout>
