<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            <a href="{{ route('penyaluran.index') }}"
                class="hover:text-indigo-600 hover:dark:text-indigo-400">Penyaluran</a> /
            {{ $penyaluran->tanggal->format('d F Y') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Informasi Penyaluran') }}
                    </x-card.title>
                    {{-- <div class="ml-auto">
                        @include('penyaluran.partials.action')
                    </div> --}}
                </div>
                <x-card.description>
                    {{ __('mengatur Informasi Penyaluran.') }}
                </x-card.description>
                <div class="mt-6">
                    <div class="min-w-full space-y-3 sm:space-y-1">
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">ID</p>
                            <p>{{ $penyaluran->id }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Uraian') }}</p>
                            <p class="break-normal truncate hover:break-all">{{ $penyaluran->uraian }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Tanggal') }}</p>
                            <p>{{ $penyaluran->tanggal->format('d F Y') }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Nominal') }}</p>
                            <p>{{ $penyaluran->nominal }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Ashnaf') }}</p>
                            <p>{{ $penyaluran->ashnaf->name }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Lembaga / Pria / Wanita') }}</p>
                            <p>
                                {{ $penyaluran->penerimaManfaat->lembaga_count ?? '-' }} /
                                {{ $penyaluran->penerimaManfaat->male_count ?? '-' }} /
                                {{ $penyaluran->penerimaManfaat->female_count ?? '-' }}
                            </p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Pilar') }}</p>
                            <p>{{ $penyaluran->programPilar->pilar->name ?? '-' }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Program Pilar') }}</p>
                            <p>{{ $penyaluran->programPilar->name ?? '-' }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Tahun') }}</p>
                            <p>{{ $penyaluran->tahun->name }}</p>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Created At') }}</p>
                            <div>
                                <p>{{ $penyaluran->created_at }}</p>
                                <p>{{ $penyaluran->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="block text-sm font-medium text-gray-700 dark:text-gray-300 sm:flex">
                            <p class="w-36">{{ __('Updated At') }}</p>
                            <div>
                                <p>{{ $penyaluran->updated_at }}</p>
                                <p>{{ $penyaluran->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
