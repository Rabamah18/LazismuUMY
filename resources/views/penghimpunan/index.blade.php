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
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.export') }}">
                            {{ __('Export Exel') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.importcsv') }}">
                            {{ __('Import CSV') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.exportcsv') }}">
                            {{ __('Export CSV') }}
                        </x-button.link-primary>
                    </div>
                    {{-- <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penghimpunan.import') }}">
                            {{ __('Import Exel') }}
                        </x-button.link-primary>
                    </div> --}}


                </div>
                @if (request('search') || request('sumber_dana'))
                    <x-card.description>
                        {{ __('Filter for') }}
                        @if (request('search'))
                            <span class="font-semibold">{{ request('search') }}</span>
                        @endif
                        @if (request('sumber_dana'))
                            {{ __('sumber_dana') }} <span class="font-semibold">{{ request('sumber_dana') }}</span>
                        @endif
                    </x-card.description>
                @else
                    <x-card.description>
                        {{ __('Manage Data Penghimpunan, search berdasarkan uraian dan tahun.') }}
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
                    <form class="flex flex-col justify-between gap-2 xl:flex-row">
                        <x-text-input id="search" name="search" type="text" class="w-full lg:w-1/3"
                            placeholder="{{ __('Search here') }}" value="{{ request('search') }}" autofocus />
                        <div class="flex items-center justify-between gap-2">
                            <div class="space-y-1">
                                <x-select-input id="sumber_dana" name="sumber_dana" class="">
                                    <option value="">{{ __('Sumber Dana') }}</option>
                                    @foreach ($sumberDanas as $sumberDana)
                                        <option value="{{ $sumberDana->id }}"
                                            {{ request('sumber_dana') == $sumberDana->id ? 'selected' : '' }}>
                                            {{ $sumberDana->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="program_sumber" name="program_sumber" class="">
                                    <option value="">{{ __('Program Sumber') }}</option>
                                    @foreach ($programSumbers as $programSumber)
                                        <option value="{{ $programSumber->id }}"
                                            {{ request('program_sumber') == $programSumber->id ? 'selected' : '' }}>
                                            {{ $programSumber->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="tahun" name="tahun" class="">
                                    <option value="">{{ __('Tahun') }}</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->id }}"
                                            {{ request('tahun') == $tahun->id ? 'selected' : '' }}>
                                            {{ $tahun->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="paginate" name="paginate" class="">
                                    <option value="">{{ __('Per Halaman') }}</option>
                                    <option value="10" {{ request('paginate') == 10 ? 'selected' : '' }}>
                                        10
                                    </option>
                                    <option value="20" {{ request('paginate') == 20 ? 'selected' : '' }}>
                                        20
                                    </option>
                                    <option value="30" {{ request('paginate') == 30 ? 'selected' : '' }}>
                                        30
                                    </option>
                                </x-select-input>

                            </div>
                            <div class="">
                                <x-button.secondary type="submit">
                                    {{ __('Apply') }}
                                </x-button.secondary>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- @include('admin.users.partials.list') --}}
                @include('penghimpunan.partials.table')

                {{-- Pagination --}}
                @if ($penghimpunans->hasPages())
                    <div class="mt-6">
                        {{-- The default pagination view is pagination.custom-tailwind blade component.
                    You can change the default pagination view using the AppServiceProvider
                    or by passing the pagination view as parameter to the links method. --}}
                        {{-- {{ $penghimpunans->links() }} --}}
                        {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}
                        {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                        {{ $penghimpunans->links('vendor.pagination.custom-tailwind') }}
                    </div>
                @endif
            </x-card.app>
        </div>
    </div>
</x-app-layout>
