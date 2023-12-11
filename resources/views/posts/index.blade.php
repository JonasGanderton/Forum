<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('posts.list', $posts)
        </div>
    
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Current page: {{ $posts->currentPage() }} --}}
            
            <a href="{{ $posts->previousPageUrl() }}" >
                {{-- $paginator->onFirstPage() --}}
                <x-primary-button>
                    {{ __('Previous') }}
                </x-primary-button>
            </a>

            <a href="{{ $posts->nextPageUrl() }}" >
                {{-- $paginator->hasMorePages() --}}
                <x-primary-button>
                    {{ __('Next') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
