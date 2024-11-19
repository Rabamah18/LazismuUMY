<x-card.app>
    <x-card.title>
        {{ __('Tabel Saldo') }}
    </x-card.title>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 table-auto dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-100 border dark:bg-gray-700 dark:text-gray-400 border-x-transparent">
                <tr>
                    <th rowspan="2" class="w-2 py-3 pl-6 text-center">
                        No.
                    </th>
                    <th rowspan="2" class="px-6 py-3">
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
                    <th class="px-6 py-3">
                        Infaq
                    </th>
                    <th class="px-6 py-3">
                        Amil
                    </th>
                </tr>
            </thead>
            <tbody class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">1</td>
                    <td class="px-6 py-2">Kas Tunai Zakat</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoTunaiZakat }}
                    </td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr>
                    <td class="px-6 py-2">2</td>
                    <td class="px-6 py-2">Kas Bsi Zakat</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBsiZakat }}
                    </td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">3</td>
                    <td class="px-6 py-2">Kas BPD DIY Zakat</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBpddiyZakat }}
                    </td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr>
                    <td class="px-6 py-2">4</td>
                    <td class="px-6 py-2">Kas Tunai Infaq</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoTunaiInfaq }}
                    </td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">5</td>
                    <td class="px-6 py-2">Kas BSI Infaq</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBsiInfaq }}
                    </td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr>
                    <td class="px-6 py-2">6</td>
                    <td class="px-6 py-2">Kas BPD DIY Infaq</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBpddiyInfaq }}
                    </td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">7</td>
                    <td class="px-6 py-2">Kas Muamalat Infaq</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoMuamalatInfaq }}
                    </td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr>
                    <td class="px-6 py-2">8</td>
                    <td class="px-6 py-2">Kas Madina Infaq</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoMadinaInfaq }}
                    </td>
                    <td class="px-6 py-2">-</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">9</td>
                    <td class="px-6 py-2">Kas Bank Amil</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBankAmil }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-2">10</td>
                    <td class="px-6 py-2">Kas Besar Amil</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoBesarAmil }}
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-2">11</td>
                    <td class="px-6 py-2">Kas Kecil Amil</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoKecilAmil }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-2">12</td>
                    <td class="px-6 py-2">Kas Madina Amil</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">-</td>
                    <td class="px-6 py-2">
                        Rp. {{ $saldoMadinaAmil }}
                    </td>
                </tr>
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-20 py-2" rowspan="3" colspan="2">Total Zakat & Infaq</td>
                    <td class="px-6 py-2">Rp. {{ $totalZakat }}</td>
                    <td class="px-6 py-2">Rp. {{ $totalInfaq }}</td>
                    <td class="px-6 py-2" rowspan="2">Rp. {{ $totalAmil }}</td>
                </tr>
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-6 py-2"></td>
                    <td class="px-6 py-2" colspan="2"> Rp. {{ $totalZakatInfaq }}</td>
                </tr>
                <tr class="border border-collapse border-x-transparent">
                    <td class="px-6 py-2"></td>
                    <td class="px-6 py-2" colspan="3">Rp. {{ $totalSemua }}</td>
                </tr>

                @forelse ($sumberDonasis as $sumberDonasi)
                    <livewire:dashboard.saldo-per-sumber-donasi :selectedTahun="$this->selectedTahun" :sumberDonasi="$sumberDonasi" :key="$sumberDonasi->id"/>

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
</x-card.app>
