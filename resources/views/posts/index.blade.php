<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status') === 'verification-link-sent')
            <div 
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                style="margin-top:-2.6em" 
                class="mb-4 text-sm text-gray-600 dark:text-gray-400 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
            >{{ __('A verification link has been emailed to you.') }}
            </div>
        @endif

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
