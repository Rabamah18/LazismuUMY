<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            {{-- <x-card.app>
                <x-card.title>
                    {{ __('Selamat Datang di :app Admin Dashboard', ['app' => config('app.name')]) }}
                </x-card.title>
            </x-card.app> --}}

            @livewire('dashboard.infostatistic')
        </div>
    </div>
</x-app-layout>
