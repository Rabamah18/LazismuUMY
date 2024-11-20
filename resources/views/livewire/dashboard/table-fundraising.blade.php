<x-card.app>
    <x-card.title>
        {{ __('Tabel Fundraising') }}
    </x-card.title>
    <x-card.description>
        {{ __('Target Tahun ini: ' . $targetselectedTahun) }}
    </x-card.description>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-2 py-3 pl-6 text-center">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Target
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Realisasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Realisasi sub Pilar
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr class="bg-gray-200 dark:bg-gray-600">
                    <td rowspan="2"></td>
                    <td rowspan="2" class="px-6 py-4 lg:table-cell">
                        Zakat({{ $targetPersenZakat }}%)
                    </td>
                    <td rowspan="2" class="px-6 py-4 lg:table-cell">
                        Rp. {{ $nominalTargetZakat }}
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiZakat }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="{{ $sumberZakats->count() + 1 }}" class="px-6 py-4 text-center lg:table-cell">
                        Rp. {{ $totalRealisasiZakat }}
                    </td>
                </tr>
                @forelse ($sumberZakats as $sumberZakat)
                    <livewire:dashboard.fundraising-per-program-sumber :selectedTahun="$this->selectedTahun" :programSumber="$sumberZakat"
                        :nominalTargetInduk="$nominalTargetZakat" :key="$sumberZakat->id">

                    @empty
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                                Empty
                            </td>
                        </tr>
                @endforelse
                <tr class="bg-orange-200 dark:bg-gray-600">
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Total
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $nominalTargetZakat }}
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $totalRealisasiZakat }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Realisasi
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                </tr>
                <tr class="bg-gray-200 dark:bg-gray-600">
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Infaq({{ $targetPersenInfaq }}%)
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $nominalTargetInfaq }}
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiInfaq }}%
                    </td>
                    <td></td>
                </tr>
                <tr class="bg-indigo-200 dark:bg-indigo-900">
                    <td class="px-6 py-4 lg:table-cell" rowspan="2"></td>
                    <td class="px-6 py-4 lg:table-cell" rowspan="2">
                        Infaq Non Rutin({{ $targetPersenInfaqNR }}%)
                    </td>
                    <td class="px-6 py-4 lg:table-cell" rowspan="2">
                        Rp. {{ $nominalTargetInfaqNonRutin }}
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiInfaqNonRutin }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-center lg:table-cell" rowspan="{{ $sumberInfaqNonRutins->count() + 1 }}">
                        Rp. {{ $totalRealisasiInfaqNonRutin }}
                    </td>
                </tr>
                @forelse ($sumberInfaqNonRutins as $sumberInfaqNonRutin)
                    <livewire:dashboard.fundraising-per-program-sumber :selectedTahun="$this->selectedTahun" :programSumber="$sumberInfaqNonRutin"
                        :nominalTargetInduk="$nominalTargetInfaqNonRutin" :key="$sumberInfaqNonRutin->id">

                    @empty
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                                Empty
                            </td>
                        </tr>
                @endforelse
                <tr class="bg-orange-200 dark:bg-gray-600">
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Total
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $nominalTargetInfaqNonRutin }}
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $totalRealisasiInfaqNonRutin }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Realisasi
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                </tr>
                <tr class="bg-indigo-200 dark:bg-indigo-900">
                    <td class="px-6 py-4 lg:table-cell" rowspan="2"></td>
                    <td class="px-6 py-4 lg:table-cell" rowspan="2">
                        Infaq Rutin({{ $targetPersenInfaqR }}%)
                    </td>
                    <td class="px-6 py-4 lg:table-cell" rowspan="2">
                        Rp. {{ $nominalTargetInfaqRutin }}
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiInfaqRutin }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-center lg:table-cell" rowspan="{{ $sumberInfaqRutins->count() + 1 }}">
                        Rp. {{ $totalRealisasiInfaqRutin }}
                    </td>
                </tr>
                @forelse ($sumberInfaqRutins as $sumberInfaqRutin)
                    <livewire:dashboard.fundraising-per-program-sumber :selectedTahun="$this->selectedTahun" :programSumber="$sumberInfaqRutin"
                        :nominalTargetInduk="$nominalTargetInfaqRutin" :key="$sumberInfaqRutin->id">

                    @empty
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                                Empty
                            </td>
                        </tr>
                @endforelse
                <tr class="bg-orange-200 dark:bg-gray-600">
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Total
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $nominalTargetInfaqRutin }}
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Rp. {{ $totalRealisasiInfaqRutin }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell">
                        Realisasi
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                </tr>
            </tbody>
        </table>
    </div>
</x-card.app>
