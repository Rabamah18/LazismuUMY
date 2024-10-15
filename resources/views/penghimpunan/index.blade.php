<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Data Penghimpunan') }}
                    </x-card.title>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.create') }}">
                            {{ __('Create') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.importexel') }}">
                            {{ __('Import Exel') }}
                        </x-button.link-primary>
                    </div>
                    {{-- <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.exportexel') }}">
                            {{ __('Export Exel') }}
                        </x-button.link-primary>
                    </div> --}}
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.importcsv') }}">
                            {{ __('Import CSV') }}
                        </x-button.link-primary>
                    </div>
                    {{-- <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.exportcsv') }}">
                            {{ __('Export CSV') }}
                        </x-button.link-primary>
                    </div> --}}
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.export') }}">
                            {{ __('Export') }}
                        </x-button.link-primary>
                    </div>


                </div>
                @livewire('penghimpunan.table')

                {{-- Pagination --}}
                {{-- @if ($penghimpunans->hasPages())
                    <div class="mt-6">
                        {{-- The default pagination view is pagination.custom-tailwind blade component.
                    You can change the default pagination view using the AppServiceProvider
                    or by passing the pagination view as parameter to the links method. --}}
                {{-- {{ $penghimpunans->links() }} --}}
                {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}
                {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                {{-- {{ $penghimpunans->links('vendor.pagination.custom-tailwind') }}
                    </div>
                @endif --}}
            </x-card.app>
        </div>
    </div>
</x-app-layout>
