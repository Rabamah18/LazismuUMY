<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                {{-- <div class="flex">
                    <x-card.title>
                        {{ __('Data Penghimpunan') }}
                    </x-card.title>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.index') }}">
                            {{ __('Cancel') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.export') }}">
                            {{ __('Export Exel') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.exportcsv') }}">
                            {{ __('Export CSV') }}
                        </x-button.link-primary>
                    </div>
                </div> --}}

                @livewire('penghimpunan.export-exel')

            </x-card.app>
        </div>
    </div>
</x-app-layout>
