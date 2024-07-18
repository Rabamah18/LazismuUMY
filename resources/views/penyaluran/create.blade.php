<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Penyaluran') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Penyaluran') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Penyaluran.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('penyaluran.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1"
                                :value="old('tanggal')" autofocus required autocomplete="tanggal" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div>
                            <x-input-label for="tahun_id" :value="__('Tahun')" />
                            <x-select-input id="tahun" name="tahun_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Tahun') }}</option>
                                @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}"
                                        {{ request('tahun_id') == 'tahun_id' ? 'selected' : '' }}>
                                        {{ $tahun->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_id')" />
                        </div>

                        <div>
                            <x-input-label for="uraian" :value="__('Uraian')" />
                            <x-textarea-input id="uraian" name="uraian" type="text" class="block w-full mt-1"
                                :value="old('uraian')" required autocomplete="uraian" />
                            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
                        </div>

                        <div>
                            <x-input-label for="ashnaf_id" :value="__('Ashnaf')" />
                            <x-select-input id="ashnaf" name="ashnaf_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Ashnaf') }}</option>
                                @foreach ($ashnafs as $ashnaf)
                                    <option value="{{ $ashnaf->id }}"
                                        {{ request('ashnaf_id') == 'ashnaf_id' ? 'selected' : '' }}>
                                        {{ $ashnaf->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('ashnaf_id')" />
                        </div>

                        <div>
                            <x-input-label for="penerima_manfaat_id" :value="__('Jumlah Lembaga')" />
                            <x-select-input id="penerima_manfaat" name="penerima_manfaat_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Jumlah Lembaga') }}</option>
                                @foreach ($penerimaManfaats as $penerimaManfaat)
                                    <option value="{{ $penerimaManfaat->id }}"
                                        {{ request('penerima_manfaat_id') == 'penerima_manfaat_id' ? 'selected' : '' }}>
                                        {{ $penerimaManfaat->lembaga_count }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('penerima_manfaat_id')" />
                        </div>

                        <div>
                            <x-input-label for="penerima_manfaat_id" :value="__('Jumlah Pria')" />
                            <x-select-input id="penerima_manfaat" name="penerima_manfaat_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Jumlah Pria') }}</option>
                                @foreach ($penerimaManfaats as $penerimaManfaat)
                                    <option value="{{ $penerimaManfaat->id }}"
                                        {{ request('penerima_manfaat_id') == 'penerima_manfaat_id' ? 'selected' : '' }}>
                                        {{ $penerimaManfaat->male_count }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('penerima_manfaat_id')" />
                        </div>

                        <div>
                            <x-input-label for="penerima_manfaat_id" :value="__('Jumlah Wanita')" />
                            <x-select-input id="penerima_manfaat" name="penerima_manfaat_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Jumlah Wanita') }}</option>
                                @foreach ($penerimaManfaats as $penerimaManfaat)
                                    <option value="{{ $penerimaManfaat->id }}"
                                        {{ request('penerima_manfaat_id') == 'penerima_manfaat_id' ? 'selected' : '' }}>
                                        {{ $penerimaManfaat->female_count }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('penerima_manfaat_id')" />
                        </div>

                        <div>
                            <x-input-label for="pilar_id" :value="__('Pilar')" />
                            <x-select-input id="pilar" name="pilar_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Pilar') }}</option>
                                @foreach ($pilars as $pilar)
                                    <option value="{{ $pilar->id }}"
                                        {{ request('pilar_id') == 'pilar_id' ? 'selected' : '' }}>
                                        {{ $pilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('pilar_id')" />
                        </div>

                        <div>
                            <x-input-label for="program_pilar_id" :value="__('Program Pilar')" />
                            <x-select-input id="program_pilar" name="program_pilar_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Program Pilar') }}</option>
                                @foreach ($programPilars as $programPilar)
                                    <option value="{{ $programPilar->id }}"
                                        {{ request('program_pilar_id') == 'program_pilar_id' ? 'selected' : '' }}>
                                        {{ $programPilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('program_pilar_id')" />
                        </div>

                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <x-text-input id="nominal" name="nominal" type="number" class="block w-full mt-1"
                                :value="old('nominal')" required autocomplete="nominal" />
                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
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
