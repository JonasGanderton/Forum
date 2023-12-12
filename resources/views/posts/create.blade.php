{{-- TODO: Move some of this styling into layouts.app --}}
{{-- TODO: Set default styles in a CSS file and reference them (less copy/pasting) --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:60rem">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div>
                            <x-input-label class="text-xl" for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label class="text-xl mt-6" for="content" :value="__('Content')" />
                            <x-textarea-input id="content" name="content" type="text" class="mt-1 block w-full" value="{{ old('content') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />

                        </div>
                        
                        {{-- TODO: Add tags as buttons. --}}

                        <div class="mt-3">
                            <x-primary-button type="submit">
                                {{ __('Submit') }}
                            </x-primary-button>
                            &nbsp;

                            {{-- TODO: Change confirmation box to not use deafult browser alert --}}
                            <a href="{{ route('home') }}" onclick="return confirm('Delete draft?')">
                                <x-secondary-button>
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
