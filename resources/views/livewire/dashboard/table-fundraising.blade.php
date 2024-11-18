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
                    <th>
                        No.
                    </th>
                    <th>
                        Nama Akun
                    </th>
                    <th>
                        Target
                    </th>
                    <th>
                        Realisasi
                    </th>
                    <th>
                        Realisasi sub Pilar
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2">
                        Zakat({{ $targetPersenZakat }}%)
                    </td>
                    <td rowspan="2">
                        Rp. {{ $nominalTargetZakat }}
                    </td>
                    <td>
                        {{ $pembulatanPersenRealisaiZakat }}%
                    </td>
                </tr>
                <tr>
                    <td rowspan="{{ $sumberZakats->count() + 1 }}">
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
                <tr>
                    <td></td>
                    <td>
                        Total
                    </td>
                    <td>
                        Rp. {{ $nominalTargetZakat }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiZakat }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Realisasi
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Infaq({{ $targetPersenInfaq }}%)</td>
                    <td>
                        Rp. {{ $nominalTargetInfaq }}
                    </td>
                    <td>
                        {{ $pembulatanPersenRealisaiInfaq }}%
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2">
                        Infaq Non Rutin({{ $targetPersenInfaqNR }}%)
                    </td>
                    <td rowspan="2">
                        Rp. {{ $nominalTargetInfaqNonRutin }}
                    </td>
                    <td>
                        {{ $pembulatanPersenRealisaiInfaqNonRutin }}%
                    </td>
                </tr>
                <tr>
                    <td rowspan="{{ $sumberInfaqNonRutins->count() + 1 }}">
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
                <tr>
                    <td></td>
                    <td>
                        Total
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqNonRutin }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiInfaqNonRutin }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Realisasi
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2">
                        Infaq Rutin({{ $targetPersenInfaqR }}%)
                    </td>
                    <td rowspan="2">
                        Rp. {{ $nominalTargetInfaqRutin }}
                    </td>
                    <td>
                        {{ $pembulatanPersenRealisaiInfaqRutin }}%
                    </td>
                </tr>
                <tr>
                    <td rowspan="{{ $sumberInfaqRutins->count() + 1 }}">
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
                <tr>
                    <td></td>
                    <td>
                        Total
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqRutin }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiInfaqRutin }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Realisasi
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</x-card.app>
