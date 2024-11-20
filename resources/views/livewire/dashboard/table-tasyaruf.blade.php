<x-card.app>
    <x-card.title>
        {{ __('Tabel Tasyaruf') }}
    </x-card.title>
    <x-card.description>
        {{ __('Target Tahun ini: ' . $targetselectedTahun) }}
    </x-card.description>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead
                class="w-full text-base text-left text-gray-500 bg-gray-100 divide-y-2 divide-gray-400 dark:divide-gray-300 dark:text-gray-400 dark:bg-gray-700">
                <tr class="">
                    <th scope="col" rowspan="2"
                        class="w-2 py-3 text-center border-r-2 border-gray-400 dark:border-gray-400">No.</th>
                    <th scope="col" class="px-6 py-3">Pilar</th>
                    <th scope="col" class="px-6 py-3 border-gray-400 dark:border-gray-400 border-x-2" rowspan="2">
                        Perencanaan Sub Pilar</th>
                    <th scope="col" class="px-6 py-3 text-center" colspan="3">Penerima Manfaat</th>
                    <th scope="col" class="px-6 py-3 border-l-2 border-gray-400 dark:border-gray-400" rowspan="2">
                        Realisasi Sub Pilar</th>
                </tr>
                <tr class="">
                    <th scope="col" class="px-6 py-3">
                        Pentasyarufan
                    </th>
                    <th scope="col" class="px-6 py-3">Lembaga</th>
                    <th scope="col" class="px-6 py-3">L</th>
                    <th scope="col" class="px-6 py-3">P</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pilars as $pilar)
                    <livewire:dashboard.tasyaruf-per-pilar :selectedTahun="$this->selectedTahun" :pilar="$pilar" :targetselectedTahun="$targetselectedTahun"
                        :key="$pilar->id" />
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
