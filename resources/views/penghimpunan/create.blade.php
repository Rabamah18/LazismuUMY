<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Penghimpunan') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Penghimpunan.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('penghimpunan.store') }}" class="mt-6 space-y-6"
                        x-data="{
                            today: new Date().toISOString().split('T')[0],
                            selectedYear: '',
                            updateYear() {
                                // Extract the year from the 'tanggal' input value
                                this.selectedYear = new Date(this.today).getFullYear();
                            }
                        }" x-init="updateYear()">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1"
                                :value="old('tanggal')" autofocus required autocomplete="tanggal" x-model="today"
                                @change="updateYear" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div>
                            <x-input-label for="uraian" :value="__('Uraian')" />
                            <x-textarea-input x-autosize id="uraian" name="uraian" type="text"
                                class="block w-full mt-1" :value="old('uraian')" required autocomplete="uraian" />
                            <x-input-error class="mt-2" :messages="$errors->get('uraian')" />
                        </div>

                        <div x-data="{ nominal: '' }">
                            <x-input-label for="nominal" :value="__('Nominal')" />

                            <x-text-input id="nominal" name="nominal" type="text" class="block w-full mt-1"
                                x-model="nominal"
                                x-on:input="nominal = 'Rp. ' + $event.target.value.replace(/[^,\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                placeholder="Rp." autocomplete="off" />

                            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                        </div>


                        <div>
                            <x-input-label for="lembaga" :value="__('Jumlah Lembaga')" />
                            <x-text-input id="lembaga" name="lembaga" type="number" class="block w-full mt-1"
                                :value="old('lembaga')" autocomplete="lembaga" min="0" placeholder="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('lembaga')" />
                        </div>

                        <div>
                            <x-input-label for="pria" :value="__('Jumlah Pria')" />
                            <x-text-input id="pria" name="pria" type="number" class="block w-full mt-1"
                                :value="old('pria')" autocomplete="pria" min="0" placeholder="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('pria')" />
                        </div>

                        <div>
                            <x-input-label for="wanita" :value="__('Jumlah Wanita')" />
                            <x-text-input id="wanita" name="wanita" type="number" class="block w-full mt-1"
                                :value="old('wanita')" autocomplete="wanita" min="0" placeholder="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('wanita')" />
                        </div>

                        <div>
                            <x-input-label for="noname" :value="__('Jumlah No Name')" />
                            <x-text-input id="noname" name="noname" type="number" class="block w-full mt-1"
                                :value="old('noname')" autocomplete="noname" min="0" placeholder="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('noname')" />
                        </div>

                        <div>
                            <x-input-label for="sumber_dana_id" :value="__('Sumber Dana')" />
                            <x-select-input id="sumber_dana" name="sumber_dana_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Sumber Dana') }}</option>
                                @foreach ($sumberDanas as $sumberDana)
                                    <option value="{{ $sumberDana->id }}"
                                        {{ request('sumber_dana_id') == 'sumber_dana_id' ? 'selected' : '' }}>
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
                                        {{ request('program_sumber_id') == 'program_sumber_id' ? 'selected' : '' }}>
                                        {{ $programSumber->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('program_sumber_id')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tahun_id" :value="__('Tahun')" />
                            <x-select-input id="tahun" name="tahun_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Tahun') }}</option>
                                @foreach ($tahuns as $tahun)
                                    <option
                                        value="{{ $tahun->id }}":selected="selectedYear == {{ $tahun->name }} ? 'selected' : ''">
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
    {{-- <script>
        const d = new Date();
        document.getElementById("tanggal").valueAsDate = d;
    </script> --}}
</x-app-layout>
