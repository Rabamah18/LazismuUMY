<div>
    <div>
        <div class="w-full mt-6">
            <div class="flex flex-col justify-between gap-2 w-gap-1 xl:flex-row">
                <div class="items-center ">
                    <x-card.title>
                        {{ __('Export Data Penyaluran') }}
                    </x-card.title>
                </div>
                <div class="flex items-center justify-end gap-4">
                    <div class="ml-auto">
                        <x-button.link-primary href="{{ route('penyaluran.index') }}">
                            {{ __('Cancel') }}
                        </x-button.link-primary>
                    </div>
                    <div class="ml-auto">
                        <x-primary-button wire:click="exportExel">
                            {{ __('Export Exel') }}
                        </x-primary-button>
                    </div>
                    <div class="ml-auto" wire:click="exportCsv">
                        <x-primary-button>
                            {{ __('Export CSV') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-wrap gap-2 mt-2">
                            <div class="flex items-center gap-2">
                                <x-input-label for="tanggal" :value="__('Tanggal Awal')" />
                                <x-text-input wire:model.lazy='dateStart' id="tanggal" type='date' class="block w-full mt-1" :value="old('tanggal')"/>
                            </div>

                            <div class=" flex items-center gap-2">
                                <x-input-label for="tanggal" :value="__('Tanggal Akhir')" />
                                <x-text-input wire:model.lazy='dateEnd' id="tanggal" type='date' class="block w-full mt-1" :value="old('tanggal')"/>
                            </div>
                            <x-select-input id="bulan" wire:model.lazy="selectedBulan" class="">
                                <option value="">{{ __('Bulan') }}</option>
                                <option value="1">
                                    Januari
                                </option>
                                <option value="2">
                                    Februari
                                </option>
                                <option value="3">
                                    Maret
                                </option>
                                <option value="4">
                                    April
                                </option>
                                <option value="5">
                                    Mei
                                </option>
                                <option value="6">
                                    Juni
                                </option>
                                <option value="7">
                                    Juli
                                </option>
                                <option value="8">
                                    Agustus
                                </option>
                                <option value="9">
                                    September
                                </option>
                                <option value="10">
                                    Oktober
                                </option>
                                <option value="11">
                                    November
                                </option>
                                <option value="12">
                                    Desember
                                </option>
                            </x-select-input>
                            <x-select-input id="tahun" wire:model.lazy="selectedTahun" class="">
                                <option value="">{{ __('Tahun') }}</option>
                                @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}">
                                        {{ $tahun->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedProvinsi" id="provinsi" class="">
                                <option value="">{{ __('Provinsi') }}</option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}">
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedKabupaten" id="kabupaten" class="">
                                <option value="">{{ __('Kabupaten') }}</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}">
                                        {{ $kabupaten->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedAshnaf" id="ashnaf" class="">
                                <option value="">{{ __('Ashnaf') }}</option>
                                @foreach ($ashnafs as $ashnaf)
                                    <option value="{{ $ashnaf->id }}">
                                        {{ $ashnaf->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedPilar" id="pilar" class="">
                                <option value="">{{ __('Pilar') }}</option>
                                @foreach ($pilars as $pilar)
                                    <option value="{{ $pilar->id }}">
                                        {{ $pilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedProgramPilar" id="program_pilar" class="">
                                <option value="">{{ __('Program Pilar') }}</option>
                                @foreach ($programPilars as $programPilar)
                                    <option value="{{ $programPilar->id }}">
                                        {{ $programPilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input id="sumber_donasi" wire:model.lazy="selectedSumberDonasi" class="">
                                <option value="">{{ __('Sumber Donasi') }}</option>
                                @foreach ($sumberDonasis as $sumberDonasi)
                                    <option value="{{ $sumberDonasi->id }}">
                                        {{ $sumberDonasi->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input id="program_sumber" wire:model.lazy="selectedProgramSumber" class="">
                                <option value="">{{ __('Program Sumber') }}</option>
                                @foreach ($programSumbers as $programSumber)
                                    <option value="{{ $programSumber->id }}">
                                        {{ $programSumber->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-select-input wire:model.lazy="selectedSumberDana" id="sumber_dana" class="">
                                <option value="">{{ __('Sumber Dana') }}</option>
                                @foreach ($sumberDanas as $sumberDana)
                                    <option value="{{ $sumberDana->id }}">
                                        {{ $sumberDana->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            {{-- <x-select-input id="paginate" wire:model.lazy="paginate" class="">
                                <option value="">{{ __('Per Halaman') }}</option>
                                <option value="30">
                                    30
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="70">
                                    70
                                </option>
                                <option value="100">
                                    100
                                </option>
                            </x-select-input> --}}

                        </div>
                    </div>
            </div>
        </div>
        <div class="relative mt-6 overflow-auto rounded-md">
            <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('No.') }}
                        </th>
                        <th scope="col" class="px-6 py-3 xl:table-cell">
                            {{ __('Tanggal') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Uraian') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Sumber Donasi') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Program Sumber') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Sumber Dana') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Nominal') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Pilar') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Program') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Ashnaf') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Lembaga') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Pria') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Wanita') }}
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Provinsi/Luar Negeri') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Kabupaten/Negara') }}
                        </th>
                        <th scope="col" class="px-6 py-3 lg:table-cell">
                            {{ __('Tahun') }}
                        </th>
                        <th scope="col" class="py-3 pl-6 pr-2 lg:pr-4">
                            {{ __('Option') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penyalurans as $penyaluran)
                        <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">

                                <div class="flex">
                                    <div class="hover:underline whitespace-nowrap">
                                        {{ $penyaluran->id }}
                                    </div>

                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 text-gray-500 font-base dark:text-gray-400 xl:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->tanggal->isoFormat('LL') }}
                                    </p>
                                </div>
                            </td>

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">

                                <div class="flex">
                                    <a href="{{ route('penyaluran.show', $penyaluran) }}"
                                        class="hover:underline whitespace-nowrap">
                                        {{ Str::limit($penyaluran->uraian, 10, '...') }}
                                    </a>

                                </div>
                            </td>

                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->programSumber->sumberDonasi->name ?? '-' }}
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->programSumber->name ?? '-' }}
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->sumberDana->name ?? '-' }}
                                    </p>
                                </div>
                            </td>

                            <td wire:key="nominal-{{ $penyaluran->id }}"
                                x-data="{
                                    nominal: {{ $penyaluran->nominal }},
                                    updateNominal() {
                                        this.nominal = {{ $penyaluran->nominal }}
                                    }
                                }"
                                x-init="
                                    Livewire.on('dataUpdated', () => {
                                        updateNominal()
                                    })
                                "
                                class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                                </div>
                            </td>

                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->programPilar->pilar->name ?? '-' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->programPilar->name ?? '-' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->ashnaf->name ?? '-' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->lembaga_count ?? '-' }}
                                    </p>

                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->male_count ?? '-' }}
                                    </p>

                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->female_count ?? '-' }}
                                    </p>

                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->kabupaten->provinsi->name ?? '-' }}
                                    </p>

                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->kabupaten->name ?? '-' }}
                                    </p>

                                </div>
                            </td>
                            <td class="px-6 py-4 lg:table-cell">
                                <div class="flex">
                                    <p>
                                        {{ $penyaluran->tahun->name }}
                                    </p>

                                </div>
                            </td>

                            <td class="py-4 pl-6 pr-2 lg:pr-4">
                                <div class="flex space-x-2 justify-items-start">
                                    <a href="{{ route('penyaluran.show', $penyaluran) }}" class="hover:underline">Lihat</a>
                                    <a href="{{ route('penyaluran.edit', $penyaluran) }}"
                                        class="text-indigo-500 hover:underline">Ubah</a>
                                    <button x-data="" class="text-red-500 hover:underline"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $penyaluran->id }}')">
                                        Hapus
                                    </button>

                                    <x-modal name="confirm-user-deletion{{ $penyaluran->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form method="post" action="{{ route('penyaluran.destroy', $penyaluran) }}"
                                            class="p-6">
                                            @csrf
                                            @method('delete')

                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                Apakah anda yakin ingin menghapus data ini?
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ $penyaluran->uraian }}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ $penyaluran->tanggal->format('d F Y') }}
                                            </p>

                                            <div class="flex justify-end mt-6">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Batal') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    {{ __('Hapus') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                                Empty
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
