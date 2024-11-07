<x-card.app>
    <!-- Card Section -->
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:py-14">
        <!-- Grid -->
        <div
            class="grid overflow-hidden border border-gray-200 shadow-sm md:grid-cols-3 rounded-xl dark:border-neutral-800">
            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Saldo Terkini
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 211.780.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Total Dana Terkumpul
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 540.240.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Total Dana Tersalurkan
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 370.110.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->

    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th rowspan="2">
                        No.
                    </th>
                    <th rowspan="2">
                        Nama sumber Saldo
                    </th>
                    <th colspan="3" class="">
                        saldo
                    </th>
                </tr>
                <tr>
                    <th>
                        Zakat
                    </th>
                    <th>
                        Infaq
                    </th>
                    <th>
                        Amil
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kas Tunai Zakat</td>
                    <td>
                        {{ $saldoTunaiZakat }}
                    </td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kas Bsi Zakat</td>
                    <td>
                        {{ $saldoBsiZakat }}
                    </td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kas BPD DIY Zakat</td>
                    <td>
                        {{ $saldoBpddiyZakat }}
                    </td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Kas Tunai Infaq</td>
                    <td>
                        {{ $saldoTunaiInfaq }}
                    </td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Kas BSI Infaq</td>
                    <td>-</td>
                    <td>
                        {{ $saldoBsiInfaq }}
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Kas BPD DIY Infaq</td>
                    <td>-</td>
                    <td>
                        {{ $saldoBpddiyInfaq }}
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Kas Muamalat Infaq</td>
                    <td>-</td>
                    <td>
                        {{ $saldoMuamalatInfaq }}
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Kas Madina Infaq</td>
                    <td>-</td>
                    <td>
                        {{ $saldoMadinaInfaq }}
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Kas Bank Amil</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{ $saldoBankAmil }}
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Kas Besar Amil</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{ $saldoBesarAmil }}
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Kas Kecil Amil</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{ $saldoKecilAmil }}
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Kas Madina Amil</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{ $saldoMadinaAmil }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td rowspan="3">Total Zakat & Infaq</td>
                    <td>{{ $totalZakat }}</td>
                    <td>{{ $totalInfaq }}</td>
                    <td>{{ $totalAmil }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"> {{ $totalZakatInfaq }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">{{ $totalSemua }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</x-card.app>
