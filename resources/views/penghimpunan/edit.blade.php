<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Data Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Edit Data Penghimpunan') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Edit Data Penghimpunan yang sudah ada.') }}
                </x-card.description>
                <div class="max-w-xl">
                    {{-- @dump($penghimpunan) --}}
                    <form method="post" action="{{ route('penghimpunan.update', $penghimpunan) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1"
                                :value="old('tanggal', $penghimpunan->tanggal->format('Y-m-d'))" autofocus required autocomplete="tanggal" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div>
                            <x-input-label for="uraian" :value="__('Uraian')" />
                            <x-textarea-input id="uraian" name="uraian" type="text" class="block w-full mt-1"
                                required autocomplete="uraian">
                                {{ old('uraian', $penghimpunan->uraian) }}
                            </x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
                        </div>

                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <x-text-input id="nominal" name="nominal" type="number" class="block w-full mt-1"
                                :value="old('nominal', $penghimpunan->nominal)" required autocomplete="nominal" />
                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                        </div>

                        <div>
                            <x-input-label for="lembaga" :value="__('Lembaga')" />
                            <x-text-input id="lembaga" name="lembaga" type="number" class="block w-full mt-1"
                                :value="old('lembaga', $penghimpunan->lembaga_count)" required autocomplete="lembaga" />
                            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
                        </div>

                        <div>
                            <x-input-label for="pria" :value="__('Pria')" />
                            <x-text-input id="pria" name="pria" type="number" class="block w-full mt-1"
                                :value="old('pria', $penghimpunan->male_count)" required autocomplete="pria" />
                            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
                        </div>

                        <div>
                            <x-input-label for="wanita" :value="__('Wanita')" />
                            <x-text-input id="wanita" name="wanita" type="number" class="block w-full mt-1"
                                :value="old('wanita', $penghimpunan->female_count)" required autocomplete="wanita" />
                            <x-input-error class="mt-2" :messages="$errors->get('wanita')" />
                        </div>

                        <div>
                            <x-input-label for="sumber_dana_id" :value="__('Sumber Dana')" />
                            <x-select-input id="sumber_dana" name="sumber_dana_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Sumber Dana') }}</option>
                                @foreach ($sumberDanas as $sumberDana)
                                    <option value="{{ $sumberDana->id }}"
                                        {{ $sumberDana->id == $penghimpunan->sumber_dana_id ? 'selected' : '' }}>
                                        {{ $sumberDana->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('sumber_dana_id')" />
                        </div>

                        <div>
                            <x-input-label for="program_sumber_id" :value="__('Program Sumber')" />
                            <x-select-input id="program_sumber" name="program_sumber_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Program Sumber') }}</option>
                                @foreach ($programSumbers as $programSumber)
                                    <option value="{{ $programSumber->id }}"
                                        {{ $programSumber->id == $penghimpunan->program_sumber_id ? 'selected' : '' }}>
                                        {{ $programSumber->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('program_sumber_id')" />
                        </div>

                        <div>
                            <x-input-label for="tahun_id" :value="__('Tahun')" />
                            <x-select-input id="tahun" name="tahun_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Tahun') }}</option>
                                @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}"
                                        {{ $tahun->id == $penghimpunan->tahun_id ? 'selected' : '' }}>
                                        {{ $tahun->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_id')" />
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
