<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Data Penyaluran') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Edit Data Penyaluran') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Edit Data Penyaluran yang sudah ada.') }}
                </x-card.description>
                <div class="max-w-xl">
                    {{-- @dump($penyaluran) --}}
                    <form method="post" action="{{ route('penyaluran.update', $penyaluran) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1"
                                :value="old('tanggal', $penyaluran->tanggal->format('Y-m-d'))" autofocus required autocomplete="tanggal" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div>
                            <x-input-label for="tahun_id" :value="__('Tahun')" />
                            <x-select-input id="tahun" name="tahun_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Tahun') }}</option>
                                @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}"
                                    {{ $tahun->id == $penyaluran->tahun_id ? 'selected' : '' }}>
                                    {{ $tahun->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_id')" />
                        </div>

                        <div>
                            <x-input-label for="uraian" :value="__('Uraian')" />
                            <x-textarea-input id="uraian" name="uraian" type="text" class="block w-full mt-1"
                                required autocomplete="uraian">
                                {{ old('uraian', $penyaluran->uraian) }}
                            </x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
                        </div>

                        <div>
                            <x-input-label for="ashnaf_id" :value="__('Ashnaf')" />
                            <x-select-input id="ashnaf" name="ashnaf_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Ashnaf') }}</option>
                                @foreach ($ashnafs as $ashnaf)
                                    <option value="{{ $ashnaf->id }}"
                                        {{ $ashnaf->id == $penyaluran->ashnaf_id ? 'selected' : '' }}>
                                        {{ $ashnaf->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('ashnaf_id')" />
                        </div>

                        <div>
                            <x-input-label for="penerima_manfaat_id" :value="__('Penerima Manfaat')" />
                            <x-select-input id="penerima_manfaat" name="penerima_manfaat_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Penerima Manfaat') }}</option>
                                @foreach ($penerimaManfaats as $penerimaManfaat)
                                    <option value="{{ $penerimaManfaat->id }}"
                                        {{ $penerimaManfaat->id == $penyaluran->penerima_manfaat_id ? 'selected' : '' }}>
                                        {{ $penerimaManfaat->lembaga_count }}
                                        {{ $penerimaManfaat->male_count }}
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
                                        {{ $pilar->id == $penyaluran->pilar_id ? 'selected' : '' }}>
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
                                        {{ $programPilar->id == $penyaluran->program_pilar_id ? 'selected' : '' }}>
                                        {{ $programPilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('program_pilar_id')" />
                        </div>

                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <x-text-input id="nominal" name="nominal" type="number" class="block w-full mt-1"
                                :value="old('nominal', $penyaluran->nominal)" required autocomplete="nominal" />
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
