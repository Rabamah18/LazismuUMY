<div>
    <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
        <td class="justify-center w-2 py-4 pl-6 font-medium text-gray-900 dark:text-gray-200">
            {{ $programPilar->index }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $programPilar->name }} ({{ $persenProgramPilar }}%)
        </td>
        <td class="px-6 py-4 lg:table-cell">
            Rp. {{ $nominalTargetProgramPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $lembagaProgramPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $lakiProgramPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $perempuanProgramPilar }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            Rp. {{ $realisasiProgramPilar }}
        </td>
    </tr>
</div>
