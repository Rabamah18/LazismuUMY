<x-card.app>
    <x-card.title>
        {{ __('Tabel Fundraising') }}
    </x-card.title>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th rowspan="3">
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
                <tr>
                    <th rowspan="2">
                        Zakat ({{ $targetPersenZakat }}%)
                    </th>
                    <th rowspan="2">
                        {{ $nominalTargetZakat }}
                    </th>
                    <th rowspan="2">
                        persen%
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Zakat Maal ({{ $targetPersenZakatMaal }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetZakatMaal }}
                    </td>
                    <td>

                    </td>
                    <td>
                        Rp. {{ $realisasiZakatMaal }}
                    </td>
                </tr>
                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        Zakat Fitrah ({{ $targetPersenZakatFitrah }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetZakatFitrah }}
                    </td>
                    <td>

                    </td>
                    <td>
                        Rp. {{ $realisasiZakatFitrah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        Zakat Profesi ({{ $targetPersenZakatProfesi }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetZakatProfesi }}
                    </td>
                    <td>

                    </td>
                    <td>
                        Rp. {{ $realisasiZakatProfesi }}
                    </td>
                </tr>
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        Zakat Muzaki reques Mustahiq ({{ $targetPersenZakatMuzaki }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetZakatMuzaki }}
                    </td>
                    <td>

                    </td>
                    <td>
                        Rp. {{ $realisasiZakatMuzaki }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-card.app>
