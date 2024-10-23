<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Penyaluran') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="items-center lg:flex lg:justify-between">
                    <x-card.title>
                        {{ __('Data Penyaluran') }}
                    </x-card.title>
                    <div class="flex flex-wrap gap-2">
                        <x-button.link-primary href="{{ route('penyaluran.create') }}">
                            {{ __('Create') }}
                        </x-button.link-primary>
                        <x-button.link-primary href="{{ route('penyaluran.importexel') }}">
                            {{ __('Import Exel') }}
                        </x-button.link-primary>
                        {{-- <x-button.link-primary href="{{ route('penyaluran.export') }}">
                            {{ __('Export Exel') }}
                        </x-button.link-primary> --}}
                        <x-button.link-primary href="{{ route('penyaluran.importcsv') }}">
                            {{ __('Import CSV') }}
                        </x-button.link-primary>
                        {{-- <x-button.link-primary href="{{ route('penyaluran.exportcsv') }}">
                            {{ __('Export CSV') }}
                        </x-button.link-primary> --}}
                        <x-button.link-primary href="{{ route('penyaluran.export') }}">
                            {{ __('Export') }}
                        </x-button.link-primary>
                    </div>
                </div>

                @livewire('penyaluran.table')

                {{-- Pagination --}}
                {{-- @if ($penyalurans->hasPages()) --}}
                    {{-- <div class="mt-6"> --}}
                        {{-- The default pagination view is pagination.custom-tailwind blade component.
                    You can change the default pagination view using the AppServiceProvider
                    or by passing the pagination view as parameter to the links method. --}}
                        {{-- {{ $penyalurans->links() }} --}}
                        {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}
                        {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                        {{-- {{ $users->links('vendor.pagination.custom-tailwind') }} --}}
                    {{-- </div> --}}
                {{-- @endif --}}
            </x-card.app>
        </div>
    </div>
</x-app-layout>
