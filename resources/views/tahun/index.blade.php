<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tahun') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Daftar Tahun') }}
                    </x-card.title>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('tahun.create') }}">
                            {{ __('Create') }}
                        </x-button.link-primary>
                    </div>
                </div>
                @if (request('search') || request('role') || request('verified_account'))
                    <x-card.description>
                        {{ __('Filter for') }}
                        @if (request('search'))
                            <span class="font-semibold">{{ request('search') }}</span>
                        @endif
                    </x-card.description>
                @else
                    <x-card.description>
                        {{ __('Mengatur daftar Tahun pembukuan.') }}
                    </x-card.description>
                @endif
                @if ($errors->any())
                    <div>
                        <ul class="mt-3 text-sm text-red-600 list-none dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="w-full mt-6">
                    <form class="flex flex-col justify-between gap-2 lg:flex-row">
                        <x-text-input id="search" name="search" type="text" class="w-full lg:w-1/3"
                            placeholder="{{ __('Search here') }}" value="{{ request('search') }}" autofocus />
                    </form>
                </div>

                @include('tahun.partials.table')

            </x-card.app>
        </div>
    </div>
</x-app-layout>
