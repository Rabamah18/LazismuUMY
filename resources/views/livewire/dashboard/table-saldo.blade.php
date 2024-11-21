<x-card.app>
    <x-card.title>
        {{ __('Tabel Saldo') }}
    </x-card.title>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-gray-500 table-auto dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-100 border border-t-0 dark:bg-gray-700 dark:text-gray-400 border-x-transparent">
                <tr>
                    <th rowspan="2" class="w-2 py-3 pl-6 text-center">
                        No.
                    </th>
                    <th rowspan="2" class="px-6 py-3 border-gray-400 border-x-2">
                        Nama sumber Saldo
                    </th>
                    <th colspan="3" class="px-6 py-3 text-center">
                        saldo
                    </th>
                </tr>
                <tr class="border border-x-transparent">
                    <th class="px-6 py-3">
                        Zakat
                    </th>
                    <th class="px-6 py-3 border-gray-400 border-x-2">
                        Infaq
                    </th>
                    <th class="px-6 py-3">
                        Amil
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sumberDonasis as $sumberDonasi)
                    <livewire:dashboard.saldo-per-sumber-donasi :selectedTahun="$this->selectedTahun" :sumberDonasi="$sumberDonasi" :key="$sumberDonasi->id" />
                @empty
                    <tr class="bg-white dark:bg-gray-800">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                            Empty
                        </td>
                    </tr>
                @endforelse
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-20 py-2" rowspan="3" colspan="2">Total Zakat & Infaq</td>
                    <td class="px-6 py-2" wire:key="nominal-{{ $totalZakat }}" x-data="{ nominal: {{ $totalZakat }} }">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                        {{-- Rp. {{ $totalZakat }} --}}
                    </td>
                    <td class="px-6 py-2" wire:key="nominal-{{ $totalInfaq }}" x-data="{ nominal: {{ $totalInfaq }} }">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                        {{-- Rp. {{ $totalInfaq }} --}}
                    </td>
                    <td class="px-6 py-2 border-l-2 border-gray-400" rowspan="2"
                        wire:key="nominal-{{ $totalAmil }}" x-data="{ nominal: {{ $totalAmil }} }">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                        {{-- Rp. {{ $totalAmil }} --}}
                    </td>
                </tr>
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-6 py-2"></td>
                    <td class="px-6 py-2" colspan="2" wire:key="nominal-{{ $totalZakatInfaq }}"
                        x-data="{ nominal: {{ $totalZakatInfaq }} }">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                        {{-- Rp. {{ $totalZakatInfaq }} --}}
                    </td>
                </tr>
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-6 py-2"></td>
                    <td class="px-6 py-2" colspan="3" wire:key="nominal-{{ $totalSemua }}" x-data="{ nominal: {{ $totalSemua }} }">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                        {{-- Rp. {{ $totalSemua }} --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-card.app>
