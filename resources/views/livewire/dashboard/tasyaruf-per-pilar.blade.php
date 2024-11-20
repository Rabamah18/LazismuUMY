<div>
    <tr class="bg-orange-600 dark:bg-indigo-800">
        <td class="justify-center w-2 py-4 pl-6 font-medium text-gray-900 dark:text-gray-200"></td>
        <td class="px-6 py-4 lg:table-cell" colspan="6">
            Pilar {{ $pilar->name }} ({{ $persenPilar }}%)
        </td>
    </tr>
    @foreach ($programPilars as $programPilar)
        <livewire:dashboard.tasyaruf-per-program-pilar :selectedTahun="$this->selectedTahun" :nominalTargetPilar="$nominalTargetPilar" :programPilar="$programPilar"
            :key="$pilar->id" />
    @endforeach
    <tr class="bg-orange-300 dark:bg-gray-600">
        <td class="px-6 py-4 lg:table-cell"></td>
        <td class="px-6 py-4 lg:table-cell"></td>
        <td class="px-6 py-4 lg:table-cell">
            Rp. {{ $nominalTargetPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $lembagaPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $lakiPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $perempuanPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            Rp. {{ $realisasiPilar }}
        </td>
    </tr>
</div>
