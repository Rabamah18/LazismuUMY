<div>
    <form wire:submit='createPenyaluran' class="mt-6 space-y-6">
        <div>
            <x-input-label for="tanggal" :value="__('Tanggal')" />
            <x-text-input wire:model='tanggal' id="tanggal" type='date' class="block w-full mt-1" :value="old('tanggal')" autofocus
                required autocomplete="tanggal" />
            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
        </div>

        <div>
            <x-input-label for="tahun_id" :value="__('Tahun')" />
            <x-select-input wire:model.change="selectedTahun" id="tahun" class="block w-full mt-1" placeholder="Select Tahun">
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
            <x-input-label for="selectedProvinsi" :value="__('Provinsi')" />
            <x-select-input wire:model.change="selectedProvinsi" id="provinsi" class="block w-full mt-1">
                <option value="">{{ __('Select Provinsi') }}</option>
                @foreach ($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}">
                        {{ __('Provinsi') }}
                        {{ $provinsi->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('selectedProvinsi')" />
        </div>

        <div>
            <x-input-label for="selectedKabupaten" :value="__('Kabupaten')" />
            <x-select-input wire:model.change="selectedKabupaten" id="kabupaten" class="block w-full mt-1"
                disabled="{{ $selectedProvinsi == null ? 'disabled' : '' }}">
                @if ($selectedProvinsi == null)
                    <option value="">{{ ('Please Select Provinsi') }}</option>
                @else
                    <option value="" @if ($selectedKabupaten == null) selected @endif>
                        {{ ('Select Kabupaten') }}
                    </option>
                    @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id }}">
                            {{ __('Kabupaten') }} {{ $kabupaten->name }}
                        </option>
                    @endforeach
                @endif
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('selectedKabupaten')" />
        </div>

        <div>
            <x-input-label for="uraian" :value="__('Uraian')" />
            <x-textarea-input x-autosize x-data wire:model='uraian' id='uraian' type='text' class="block w-full mt-1" :value="old('uraian')"
                required autocomplete="uraian" placeholder="Uraian"/>
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
                required autocomplete="lembaga" placeholder="Jumlah Lembaga"/>
            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
        </div>

        <div>
            <x-input-label for="pria" :value="__('Pria')" />
            <x-text-input wire:model='pria' id="pria" type="number" class="block w-full mt-1" :value="old('pria')"
                required autocomplete="pria" placeholder="Jumlah Pria"/>
            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
        </div>

        <div>
            <x-input-label for="wanita" :value="__('Wanita')" />
            <x-text-input wire:model='wanita' id="wanita" type="number" class="block w-full mt-1" :value="old('wanita')"
                required autocomplete="wanita" placeholder="Jumlah Wanita"/>
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
            <x-input-label for="selectedProgramPilar" :value="__('Program Pilar')" />
            <x-select-input wire:model.change="selectedProgramPilar" id="programPilar" class="block w-full mt-1"
                disabled="{{ $selectedPilar == null ? 'disabled' : '' }}">
                @if ($selectedPilar == null)
                    <option value="">{{ ('Please Select Pilar') }}</option>
                @else
                    <option value="" @if ($selectedProgramPilar == null) selected @endif>
                        {{ ('Select Program Pilar') }}
                    </option>
                    @foreach ($programPilars as $programPilar)
                        <option value="{{ $programPilar->id }}">
                            {{ __('Program Pilar') }} {{ $programPilar->name }}
                        </option>
                    @endforeach
                @endif
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('selectedProgramPilar')" />
        </div>

        <div>
            <x-input-label for="nominal" :value="__('Nominal')" />
            <x-text-input wire:model='nominal' id='nominal' type="number" class="block w-full mt-1" :value="old('nominal')"
                required autocomplete="nominal" placeholder="Jumlah Nominal"/>
            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button.primary type="submit">{{ __('Save') }}</x-button.primary>
        </div>
    </form>
</div>
