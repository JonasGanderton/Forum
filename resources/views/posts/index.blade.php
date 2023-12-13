<x-app-layout>
    <div class="py-12">
        @if (session('status'))
            <div 
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                style="margin-top:-2.55em" 
                class="mb-4 text-sm text-gray-600 dark:text-gray-400 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
                >{{ session('status') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('posts.list', $posts)
        </div>
    
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Previous page button --}}
            @if ($posts->onFirstPage())
                <x-secondary-button disabled>
                    {{ __('Previous') }}
                </x-secondary-button>
            @else
                <a href="{{ $posts->previousPageUrl() }}" >
                    <x-primary-button>
                        {{ __('Previous') }}
                    </x-primary-button>
                </a>
            @endif
            
            {{-- Next page button --}}
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" >
                    <x-primary-button>
                        {{ __('Next') }}
                    </x-primary-button>
                </a>
            @else
                <x-secondary-button disabled>
                    {{ __('Next') }}
                </x-secondary-button>
            @endif
        </div>
    </div>
</x-app-layout>
