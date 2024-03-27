<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Penyaluran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="flex">
                    <x-card.title>
                        {{ __('Data Penyaluran') }}
                    </x-card.title>
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penyaluran.create') }}">
                            {{ __('Create') }}
                        </x-button.link-primary>
                    </div>
                </div>
                @if (request('search') || request('ashnaf') || request('verified_account'))
                    <x-card.description>
                        {{ __('Filter for') }}
                        @if (request('search'))
                            <span class="font-semibold">{{ request('search') }}</span>
                        @endif
                        @if (request('ashnaf'))
                            {{ __('ashnaf') }} <span class="font-semibold">{{ request('ashnaf') }}</span>
                        @endif
                        @if (request('verified_account'))
                            {{ __('status') }} <span class="font-semibold">
                                @if (request('verified_account') == 'true')
                                    {{ __('verified') }}
                                @else
                                    {{ __('not verified') }}
                                @endif
                            </span>
                        @endif
                    </x-card.description>
                @else
                    <x-card.description>
                        {{ __('Manage Data Penyaluran, search by Uraian.') }}
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
                        <div class="flex items-center justify-between gap-2">
                            <div class="">
                                <x-select-input id="ashnaf" name="ashnaf" class="">
                                    <option value="">{{ __('Select ashnaf') }}</option>
                                    @foreach ($ashnafs as $ashnaf)
                                        <option value="{{ $ashnaf->id }}"
                                            {{ request('ashnaf') == $ashnaf->id ? 'selected' : '' }}>
                                            {{ $ashnaf->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="pilar" name="pilar" class="">
                                    <option value="">{{ __('Select pilar') }}</option>
                                    @foreach ($pilars as $pilar)
                                        <option value="{{ $pilar->id }}"
                                            {{ request('pilar') == $pilar->id ? 'selected' : '' }}>
                                            {{ $pilar->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="program_pilar" name="program_pilar" class="">
                                    <option value="">{{ __('Select Program Pilar') }}</option>
                                    @foreach ($programPilars as $programPilar)
                                        <option value="{{ $programPilar->id }}"
                                            {{ request('program_pilar') == $programPilar->id ? 'selected' : '' }}>
                                            {{ $programPilar->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-select-input id="tahun" name="tahun" class="">
                                    <option value="">{{ __('Select Tahun') }}</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->id }}"
                                            {{ request('tahun') == $tahun->id ? 'selected' : '' }}>
                                            {{ $tahun->name }}
                                        </option>
                                    @endforeach
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
                @include('penyaluran.partials.table')

                {{-- Pagination --}}
                @if ($penyalurans->hasPages())
                    <div class="mt-6">
                        {{-- The default pagination view is pagination.custom-tailwind blade component.
                    You can change the default pagination view using the AppServiceProvider
                    or by passing the pagination view as parameter to the links method. --}}
                        {{ $penyalurans->links() }}
                        {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}
                        {{-- {{ $users->links('vendor.pagination.simple-tailwind') }} --}}
                        {{-- {{ $users->links('vendor.pagination.custom-tailwind') }} --}}
                    </div>
                @endif
            </x-card.app>
        </div>
    </div>
</x-app-layout>
