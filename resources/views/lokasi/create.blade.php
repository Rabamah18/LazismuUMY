<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Lokasi') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Lokasi') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Lokasi.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('lokasi.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="provinsi_id" :value="__('Provinsi')" />
                            <x-select-input id="provinsi" name="provinsi_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Provinsi') }}</option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}"
                                        {{ request('provinsi_id') == 'provinsi_id' ? 'selected' : '' }}>
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('provinsi_id')" />
                        </div>

                        <div>
                            <x-input-label for="kabupaten_id" :value="__('Kabupaten')" />
                            <x-select-input id="kabupaten" name="kabupaten_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Kabupaten') }}</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}"
                                        {{ request('kabupaten_id') == 'kabupaten_id' ? 'selected' : '' }}>
                                        {{ $kabupaten->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kabupaten_id')" />
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
