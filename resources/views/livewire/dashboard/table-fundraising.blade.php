<x-card.app>
    <x-card.title>
        {{ __('Tabel Fundraising') }}
    </x-card.title>
    <x-card.description>
        <div class="flex gap-4 text-black dark:text-white">
            <p>Target Tahun ini: Rp.</p>
            <p>{{ number_format($targetselectedTahun, 0, ',', '.') }}</p>
        </div>
    </x-card.description>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3 text-center">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Target
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Realisasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
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
                    <td wire:key="nominal-{{ $nominalTargetZakat }}" x-data="{ nominal: {{ $nominalTargetZakat }} }"
                        class="px-6 py-4 lg:table-cell min-w-44" rowspan="2">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiZakat }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="{{ $sumberZakats->count() + 1 }}" class="px-6 py-4 text-center lg:table-cell"
                        wire:key="nominal-{{ $totalRealisasiZakat }}" x-data="{ nominal: {{ $totalRealisasiZakat }} }">
                        <div class="flex justify-center gap-4">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetZakat }}" x-data="{ nominal: {{ $nominalTargetZakat }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td wire:key="nominal-{{ $totalRealisasiZakat }}" x-data="{ nominal: {{ $totalRealisasiZakat }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetInfaq }}" x-data="{ nominal: {{ $nominalTargetInfaq }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetInfaqNonRutin }}" x-data="{ nominal: {{ $nominalTargetInfaqNonRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44" rowspan="2">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiInfaqNonRutin }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-center lg:table-cell" rowspan="{{ $sumberInfaqNonRutins->count() + 1 }}"
                        wire:key="nominal-{{ $totalRealisasiInfaqNonRutin }}" x-data="{ nominal: {{ $totalRealisasiInfaqNonRutin }} }">
                        <div class="flex justify-center gap-4">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetInfaqNonRutin }}" x-data="{ nominal: {{ $nominalTargetInfaqNonRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td wire:key="nominal-{{ $totalRealisasiInfaqNonRutin }}" x-data="{ nominal: {{ $totalRealisasiInfaqNonRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetInfaqRutin }}" x-data="{ nominal: {{ $nominalTargetInfaqRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44" rowspan="2">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center lg:table-cell">
                        {{ $pembulatanPersenRealisaiInfaqRutin }}%
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-center lg:table-cell" rowspan="{{ $sumberInfaqRutins->count() + 1 }}"
                        wire:key="nominal-{{ $totalRealisasiInfaqRutin }}" x-data="{ nominal: {{ $totalRealisasiInfaqRutin }} }">
                        <div class="flex justify-center gap-4">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
                    <td wire:key="nominal-{{ $nominalTargetInfaqRutin }}" x-data="{ nominal: {{ $nominalTargetInfaqRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell"></td>
                    <td wire:key="nominal-{{ $totalRealisasiInfaqRutin }}" x-data="{ nominal: {{ $totalRealisasiInfaqRutin }} }"
                        class="px-6 py-4 lg:table-cell min-w-44">
                        <div class="flex justify-between">
                            <p>Rp.</p>
                            <p x-text="nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
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
