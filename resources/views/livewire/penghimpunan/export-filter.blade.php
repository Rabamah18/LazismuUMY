<div>
    <div>
        <div class="w-full mt-6">
            <div class="flex flex-col justify-between gap-2 w-gap-1 xl:flex-row">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex">
                        <x-card.title>
                            {{ __('Data Penghimpunan') }}
                        </x-card.title>
                        <div class="ml-auto">
                            <x-primary-button wire:click="">
                                {{ __('Cancel') }}
                            </x-primary-button>
                        </div>
                        <div class="ml-auto">
                            <x-primary-button >
                                {{ __('Export Exel') }}
                            </x-primary-button>
                        </div>
                        <div class="ml-auto">
                            <x-primary-button >
                                {{ __('Export CSV') }}
                            </x-primary-button>
                        </div>
                    </div>
                    <div class="space-y-1">
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
                        <x-select-input wire:model.lazy="selectedSumberDana" id="sumber_dana" class="">
                            <option value="">{{ __('Sumber Dana') }}</option>
                            @foreach ($sumberDanas as $sumberDana)
                                <option value="{{ $sumberDana->id }}">
                                    {{ $sumberDana->name }}
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
                    </div>
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
                        {{ __('Nominal') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Lembaga') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Pria') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Wanita') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Sumber Dana') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Program Sumber') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Tahun') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penghimpunans as $penghimpunan)
                    <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">

                            <div class="flex">
                                <div class="hover:underline whitespace-nowrap">
                                    {{ $penghimpunan->id }}
                                </div>

                            </div>
                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-500 font-base dark:text-gray-400 xl:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->tanggal->isoFormat('LL') }}
                                </p>
                            </div>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">

                            <div class="flex">
                                <a href="{{ route('penghimpunan.show', $penghimpunan) }}"
                                    class="hover:underline whitespace-nowrap">
                                    {{ Str::limit($penghimpunan->uraian, 10, '...') }}
                                </a>

                            </div>
                        </td>

                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->nominal }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->lembaga_count ?? '-' }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->male_count ?? '-' }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->female_count ?? '-' }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->sumberDana->name ?? '-' }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->programSumber->name ?? '-' }}
                                </p>

                            </div>
                        </td>
                        <td class="px-6 py-4 lg:table-cell">
                            <div class="flex">
                                <p>
                                    {{ $penghimpunan->tahun->name ?? '-' }}
                                </p>

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
