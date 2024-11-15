<x-card.app>
    <x-card.title>
        {{ __('Tabel Fundraising') }}
    </x-card.title>
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
                    <td></td>
                    <td rowspan="2">
                        Zakat ({{ $targetPersenZakat }}%)
                    </td>
                    <td rowspan="2">
                        {{ $nominalTargetZakat }}
                    </td>
                    <td rowspan="2">
                       {{ $persenRealisasiZakat }}
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
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
                <tr>
                    <td></td>
                    <td>Zakat</td>
                    <td>Rp. {{ $nominalTargetZakat }}</td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiZakat }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Realisasi</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Dana Titipan</td>
                    <td></td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiDanaTitipan }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Infaq Shodaqqoh ({{ $targetPersenInfaq }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaq }}
                    </td>
                    <td>persen%</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Infaq Non Rutin ({{ $targetPersenInfaqNR }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqNonRutin }}
                    </td>
                    <td>
                        {{ $persenRealisasiInfaqNonRutin }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        Infaq Shodaqoh BSI ({{ $targetPersenInfaqBSi }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqBsi }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqBSi }}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        Qris BSI ({{ $targetPersenInfaqQrisBsi }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetQrisBsi }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqQrisBsi }}
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        Infaq Shodaqoh BPD ({{ $targetPersenInfaqBpd }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqBpd }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqBpd }}
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        Qris BPD ({{ $targetPersenInfaqQrisBpd }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetQrisBpd }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqQrisBpd }}
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        Kencleng ({{ $targetPersenInfaqKencleng }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetKencleng }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqKencleng }}
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        Program Eskternal ({{ $targetPersenProgramEskternal }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetProgramEskternal }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiProgramEskternal }}
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        Program Internal ({{ $targetPersenProgramInternal }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetProgramInternal }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiProgramInternal }}
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        Bagi Hasil BPD ({{ $targetPersenBagiHasilBpd }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetBagiHasilBpd }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiBagiHasilBpd }}
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        Qurban ({{ $targetPersenQurban }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetQurban }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiQurban }}
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        Infaq Refund ({{ $targetPersenInfaqRefund }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqRefund }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqRefund }}
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>
                        Donasi ({{ $targetPersenDonasi }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetDonasi }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiDonasi }}
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>
                        Takjil ({{ $targetPersenTakjil }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetTakjil }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiTakjil }}
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>
                        Fidyah ({{ $targetPersenFidyah }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetFidyah }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiFidyah }}
                    </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        Jumat Berkah ({{ $targetPersenJumatBerkah }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetJumatBerkah }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiJumatBerkah }}
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>
                        Infaq Takmir Masjid Kampus ({{ $targetPersenInfaqTakmirKampus }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqTakmirKampus }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqTakmirKampus }}
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>
                        Infaq Stand Acara ({{ $targetPersenInfaqStandAcara }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqStandAcara }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiInfaqStandAcara }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Infaq Non Rutin</td>
                    <td>Rp. {{ $nominalTargetInfaqNonRutin }}</td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiInfaqNonRutin }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Realisasi</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Infaq Rutin ({{ $targetPersenInfaqR }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetInfaqRutin }}
                    </td>
                    <td>
                        {{ $persenRealisasiInfaqRutin }} %
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>
                        Pot Infaq Gaji Dosen dan Tentik ({{ $targetPersenPotInfaqGaji }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetPotInfaqGajiDosen }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiPotInfaqGaji }}
                    </td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>
                        Pot Infaq HR KBK ({{ $targetPersenPotInfaqHrkbk }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetPotInfaqHrkbk }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiPotInfaqHrkbk }}
                    </td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>
                        Pot Infaq Karyawan ({{ $targetPersenPotInfaqKaryawan }}%)
                    </td>
                    <td>
                        Rp. {{ $nominalTargetPotInfaqKaryawan }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $realisasiPotInfaqKaryawan }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Infaq Rutin</td>
                    <td>Rp. {{ $nominalTargetInfaqRutin }}</td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiInfaqRutin }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Realisasi</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Infaq R dan NR</td>
                    <td>
                        Rp. {{ $nominalTargetInfaq }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiInfaq }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Infaq Zakat dan Infaq</td>
                    <td>
                        Rp. {{ $targetTahunx }}
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ $totalRealisasiZakatInfaq }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-card.app>
