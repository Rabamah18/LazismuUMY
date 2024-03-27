<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            <a href="{{ route('penghimpunan.index') }}"
                class="hover:text-indigo-600 hover:dark:text-indigo-400">Penghimpunan</a> /
            {{ $penghimpunan->tanggal->format('d F Y') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Informasi Penghimpunan') }}
                    </x-card.title>
                    {{-- <div class="ml-auto">
                        @include('penghimpunan.partials.action')
                    </div> --}}
                </div>
                <x-card.description>
                    {{ __('mengatur Informasi Penghimpunan.') }}
                </x-card.description>
                <div class="mt-6">
                    <div class="min-w-full space-y-3 sm:space-y-1">
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">ID</p>
                            <p>{{ $penghimpunan->id }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Tanggal') }}</p>
                            <p>{{ $penghimpunan->tanggal->format('d F Y') }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Uraian') }}</p>
                            <p class="break-normal truncate hover:break-all">{{ $penghimpunan->uraian }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Program Sumber') }}</p>
                            <p>{{ $penghimpunan->programSumber->name ?? '-' }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Sumber Dana') }}</p>
                            <p>{{ $penghimpunan->sumberDana->name ?? '-' }}</p>
                            {{-- @if ($penghimpunan->is_verified)
                                <div class="flex items-center">
                                    <x-badge.verified-account />
                                </div>
                            @else
                                <div class="flex items-center">
                                    <x-badge.unverified-account />
                                </div>
                            @endif --}}
                        </div>
                        {{-- <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Role') }}</p>
                            <div>
                                @if ($penghimpunan->is_admin)
                                    <x-badge.admin />
                                @else
                                    <x-badge.user />
                                @endif
                            </div>
                        </div> --}}
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Tahun') }}</p>
                            <p>{{ $penghimpunan->tahun->name ?? '-' }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Program Sumber') }}</p>
                            <p>{{ $penghimpunan->nominal }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Created At') }}</p>
                            <div>
                                <p>{{ $penghimpunan->created_at }}</p>
                                <p>{{ $penghimpunan->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Updated At') }}</p>
                            <div>
                                <p>{{ $penghimpunan->updated_at }}</p>
                                <p>{{ $penghimpunan->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
