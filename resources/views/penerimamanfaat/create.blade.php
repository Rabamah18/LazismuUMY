<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Penerima Manfaat') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Penerima Manfaat') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Penerima Manfaat.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('penerimamanfaat.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="lembaga" :value="__('Lembaga')" />
                            <x-text-input id="lembaga" name="lembaga" type="number" class="block w-full mt-1"
                                :value="old('lembaga')" required autocomplete="lembaga" />
                            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
                        </div>
                        <div>
                            <x-input-label for="pria" :value="__('Pria')" />
                            <x-text-input id="pria" name="pria" type="number" class="block w-full mt-1"
                                :value="old('pria')" required autocomplete="pria" />
                            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
                        </div>
                        <div>
                            <x-input-label for="wanita" :value="__('Wanita')" />
                            <x-text-input id="wanita" name="wanita" type="number" class="block w-full mt-1"
                                :value="old('wanita')" required autocomplete="wanita" />
                            <x-input-error class="mt-2" :messages="$errors->get('wanita')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-button.primary>{{ __('Save') }}</x-button.primary>
                        </div>
                    </form>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
