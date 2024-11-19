<x-card.app>
    <x-card.title>
        {{ __('Tabel Fundraising') }}
    </x-card.title>
    <x-card.description>
        {{ __('Target Tahun ini: ' . $targetselectedTahun) }}
    </x-card.description>
    <div class="relative mt-6 overflow-auto rounded-md">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                <tr>
                    <th rowspan="2">No</th>
                    <th>Pilar</th>
                    <th rowspan="2">Perencanaan Sub Pilar</th>
                    <th colspan="3">Penerima Manfaat</th>
                    <th rowspan="2">Realisasi Sub Pilar</th>
                </tr>
                <tr>
                    <th>
                        Pentasyarufan
                    </th>
                    <th>Lembaga</th>
                    <th>L</th>
                    <th>P</th>
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
