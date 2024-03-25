<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Penerima Manfaat') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Penghimpunan') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Penghimpunan.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('penghimpunan.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="text" class="block w-full mt-1"
                                :value="old('tanggal')" autofocus required autocomplete="tanggal" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div>
                            <x-input-label for="uraian" :value="__('Uraian')" />
                            <x-text-input id="uraian" name="uraian" type="text" class="block w-full mt-1"
                                :value="old('uraian')" required autocomplete="uraian" />
                            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
                        </div>

                        <div>
                            <x-input-label for="sumber_dana" :value="__('Sumber_dana')" />
                            <x-text-input id="sumber_dana" name="sumber_dana" type="text" class="block w-full mt-1"
                                :value="old('sumber_dana')" required autocomplete="sumber_dana" />
                            <x-input-error class="mt-2" :messages="$errors->get('sumber_dana')" />
                        </div>

                        <div>
                            <x-input-label for="program_sumber" :value="__('Program_sumber')" />
                            <x-text-input id="program_sumber" name="program_sumber" type="text"
                                class="block w-full mt-1" :value="old('program_sumber')" required autocomplete="program_sumber" />
                            <x-input-error class="mt-2" :messages="$errors->get('program_sumber')" />
                        </div>

                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <x-text-input id="nominal" name="nominal" type="number" class="block w-full mt-1"
                                :value="old('nominal')" required autocomplete="nominal" />
                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
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
