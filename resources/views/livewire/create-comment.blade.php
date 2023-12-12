<form wire:submit="save">
    <x-input-label class="text-xl mt-6" for="content" :value="__('Comment')" />
    <x-textarea-input wire:model="content" type="text" class="mt-1 block w-full" value="" required style="height:6em"/>
    <x-input-error class="mt-2" :messages="$errors->get('content')" />
    <x-primary-button type="submit" class="mt-3">{{ __('Submit') }}</x-primary-button>
</form>