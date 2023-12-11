<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $userAccount->username }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- TODO:
            - Find a way of paginating results
            - Display comments once added too 
        --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- TODO: Get posts in a way that enables pagination --}}
            @include('posts.list', $posts=$userAccount->posts->sortByDesc('posted_at'))
        </div>
{{--    <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">            
            <a href="{{ $posts->previousPageUrl() }}" >
                <x-primary-button>
                    {{ __('Previous') }}
                </x-primary-button>
            </a>

            <a href="{{ $posts->nextPageUrl() }}" >
                <x-primary-button>
                    {{ __('Next') }}
                </x-primary-button>
            </a>
        </div> --}}
    </div>
</x-app-layout>
