<div>
    <form method="post" action="{{ route('penyaluran.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <div>
            <x-input-label for="tanggal" :value="__('Tanggal')" />
            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1" :value="old('tanggal')" autofocus
                required autocomplete="tanggal" />
            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
        </div>

        <div>
            <x-input-label for="tahun_id" :value="__('Tahun')" />
            <x-select-input id="tahun" name="tahun_id" class="block w-full mt-1">
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
            <x-select-input wire:model.change="selectedKabupaten" id="kabupaten" class="block w-full mt-1">
                @if ($selectedProvinsi !== null)
                    <option value="" @if ($selectedKabupaten == null) selected @endif>
                        {{ __('Select Kabupaten') }}
                    </option>
                    @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id }}">
                            {{ __('Kabupaten') }} {{ $kabupaten->name }}
                        </option>
                    @endforeach
                @else
                    <option value="">{{ __('Please Select Provinsi') }}</option>
                @endif
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('selectedKabupaten')" />
        </div>

        <div>
            <x-input-label for="uraian" :value="__('Uraian')" />
            <x-textarea-input id="uraian" name="uraian" type="text" class="block w-full mt-1" :value="old('uraian')"
                required autocomplete="uraian" />
            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
        </div>

        <div>
            <x-input-label for="ashnaf_id" :value="__('Ashnaf')" />
            <x-select-input id="ashnaf" name="ashnaf_id" class="block w-full mt-1">
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
            <x-text-input id="lembaga" name="lembaga" type="number" class="block w-full mt-1" :value="old('lembaga')"
                required autocomplete="lembaga" />
            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
        </div>

        <div>
            <x-input-label for="pria" :value="__('Pria')" />
            <x-text-input id="pria" name="pria" type="number" class="block w-full mt-1" :value="old('pria')"
                required autocomplete="pria" />
            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
        </div>

        <div>
            <x-input-label for="wanita" :value="__('Wanita')" />
            <x-text-input id="wanita" name="wanita" type="number" class="block w-full mt-1" :value="old('wanita')"
                required autocomplete="wanita" />
            <x-input-error class="mt-2" :messages="$errors->get('wanita')" />
        </div>

        <div>
            <x-input-label for="program_pilar_id" :value="__('Program Pilar')" />
            <x-select-input id="program_pilar" name="program_pilar_id" class="block w-full mt-1">
                <option value="">{{ __('Select Program Pilar') }}</option>
                @foreach ($programPilars as $programPilar)
                    <option value="{{ $programPilar->id }}"
                        {{ request('program_pilar_id') == 'program_pilar_id' ? 'selected' : '' }}>
                        {{ __('Pilar') }}
                        {{ $programPilar->pilar->name }} -
                        {{ __('Program') }}
                        {{ $programPilar->name }}
                    </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('program_pilar_id')" />
        </div>

        <div>
            <x-input-label for="nominal" :value="__('Nominal')" />
            <x-text-input id="nominal" name="nominal" type="number" class="block w-full mt-1" :value="old('nominal')"
                required autocomplete="nominal" />
            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button.primary>{{ __('Save') }}</x-button.primary>
        </div>
    </form>
</div>
