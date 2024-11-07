<div>
    <form wire:submit='updatePenyaluran' class="mt-6 space-y-6">
        <div>
            <x-input-label for="tanggal" :value="__('Tanggal')" />
            <x-text-input wire:model='tanggal' id="tanggal" type='date' class="block w-full mt-1" :value="old('tanggal')" autofocus
                required autocomplete="tanggal" />
            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
        </div>

        <div>
            <x-input-label for="tahun_id" :value="__('Tahun')" />
            <x-select-input wire:model.change="selectedTahun" id="tahun" class="block w-full mt-1">
                <option value="">{{ __('Select Tahun') }}</option>
                @foreach ($tahuns as $tahun)
                <option value="{{ $tahun->id }}" {{ request('tahun_id') == 'tahun_id' ? 'selected' : '' }}>
                    {{ $tahun->name }}
                </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('tahun_id')" />
        </div>

        <div>
            <x-input-label for="selectedProvinsi" :value="__('Provinsi/Luar Negeri')" />
            <x-select-input wire:model.change="selectedProvinsi" id="provinsi" class="block w-full mt-1">
                <option value="">{{ __('Select Provinsi/Luar Negeri') }}</option>
                @foreach ($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}">
                        {{ $provinsi->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('selectedProvinsi')" />
        </div>

        <div>
            <x-input-label for="selectedKabupaten" :value="__('Kabupaten/Negara')" />
            <x-select-input wire:model.change="selectedKabupaten" id="kabupaten" class="block w-full mt-1"
                disabled="{{ $selectedProvinsi == null ? 'disabled' : '' }}">
                @if ($selectedProvinsi == null)
                    <option value="">{{ ('Please Select Provinsi/Luar Negeri') }}</option>
                @else
                    <option value="" @if ($selectedKabupaten == null) selected @endif>
                        {{ ('Select Kabupaten') }}
                    </option>
                    @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id }}">
                            {{ $kabupaten->name }}
                        </option>
                    @endforeach
                @endif
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('selectedKabupaten')" />
        </div>

        <div>
            <x-input-label for="uraian" :value="__('Uraian')" />
            <x-textarea-input x-autosize x-data wire:model='uraian' id='uraian' type='text' class="block w-full mt-1" :value="old('uraian')"
                required autocomplete="uraian" />
            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
        </div>

        <div>
            <x-input-label for="ashnaf_id" :value="__('Ashnaf')" />
            <x-select-input wire:model.change="selectedAshnaf" id="ashnaf" class="block w-full mt-1">
                <option value="">{{ __('Select Ashnaf') }}</option>
                @foreach ($ashnafs as $ashnaf)
                <option value="{{ $ashnaf->id }}" {{ request('ashnaf_id') == 'ashnaf_id' ? 'selected' : '' }}>
                    {{ $ashnaf->name }}
                </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('ashnaf_id')" />
        </div>

        <div>
            <x-input-label for="lembaga" :value="__('Lembaga')" />
            <x-text-input wire:model='lembaga' id="lembaga" type="number" class="block w-full mt-1" :value="old('lembaga')"
                required autocomplete="lembaga" />
            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
        </div>

        <div>
            <x-input-label for="pria" :value="__('Pria')" />
            <x-text-input wire:model='pria' id="pria" type="number" class="block w-full mt-1" :value="old('pria')"
                required autocomplete="pria" />
            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
        </div>

        <div>
            <x-input-label for="wanita" :value="__('Wanita')" />
            <x-text-input wire:model='wanita' id="wanita" type="number" class="block w-full mt-1" :value="old('wanita')"
                required autocomplete="wanita" />
            <x-input-error class="mt-2" :messages="$errors->get('wanita')" />
        </div>

        <div>
            <x-input-label for="selectedPilar" :value="__('Pilar')" />
            <x-select-input wire:model.change="selectedPilar" id="pilar" class="block w-full mt-1">
                <option value="">{{ __('Select Pilar') }}</option>
                @foreach ($pilars as $pilar)
                    <option value="{{ $pilar->id }}">
                        {{ __('Pilar') }}
                        {{ $pilar->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('selectedPilar')" />
        </div>

        <div>
            <x-input-label for="selectedProgramPilar" :value="__('Program')" />
            <x-select-input wire:model.change="selectedProgramPilar" id="programPilar" class="block w-full mt-1"
                disabled="{{ $selectedPilar == null ? 'disabled' : '' }}">
                @if ($selectedPilar == null)
                    <option value="">{{ ('Please Select Pilar') }}</option>
                @else
                    <option value="" @if ($selectedProgramPilar == null) selected @endif>
                        {{ ('Select Program') }}
                    </option>
                    @foreach ($programPilars as $programPilar)
                        <option value="{{ $programPilar->id }}">
                            {{ __('Program') }} {{ $programPilar->name }}
                        </option>
                    @endforeach
                @endif
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('selectedProgramPilar')" />
        </div>

        <div>
            <x-input-label for="sumber_dana_id" :value="__('Sumber Dana')" />
            <x-select-input wire:model.change="selectedSumberDana" id="sumber_dana" class="block w-full mt-1">
                <option value="">{{ __('Select Sumber Dana') }}</option>
                @foreach ($sumberDanas as $sumberDana)
                    <option value="{{ $sumberDana->id }}" {{ request('sumber_dana_id') == 'sumber_dana_id' ? 'selected' : '' }}>
                        {{ $sumberDana->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('sumber_dana_id')" />
        </div>

        <div>
            <x-input-label for="program_sumber_id" :value="__('Program Sumber')" />
            <x-select-input wire:model.change="selectedProgramSumber" id="program_sumber" class="block w-full mt-1">
                <option value="">{{ __('Select Program Sumber') }}</option>
                @foreach ($programSumbers as $programSumber)
                    <option value="{{ $programSumber->id }}" {{ request('program_sumber_id') == 'program_sumber_id' ? 'selected' : '' }}>
                        {{ $programSumber->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('program_sumber_id')" />
        </div>

        <div x-data="{
            nominal: '{{ $penyaluran->nominal }}',
            formattedNominal: ''
        }" x-init="// Format the initial value of nominal on page load
        formattedNominal = 'Rp. ' + (nominal || '').replace(/[^,\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');">
            <x-input-label for="nominal" :value="__('Nominal')" />

            <x-text-input id="formatted_nominal" wire:model="nominal" type="text"
                class="block w-full mt-1" x-model="formattedNominal"
                x-on:input="
                // Format the displayed nominal with 'Rp.' and thousands separators
                formattedNominal = 'Rp. ' + $event.target.value.replace(/[^,\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                // Update the hidden nominal field with an integer-only value
                nominal = $event.target.value.replace(/[^0-9]/g, '');
            "
                placeholder="Rp." autocomplete="off" />

            <!-- Hidden input to send the integer value -->
            <input type="hidden" wire:model="nominal" :value="nominal">

            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button.primary type="submit">{{ __('Save') }}</x-button.primary>
        </div>
    </form>
</div>
