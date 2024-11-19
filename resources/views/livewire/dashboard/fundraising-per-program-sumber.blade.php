<tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
    <td class="justify-center w-2 py-4 pl-6 font-medium text-gray-900 dark:text-gray-200">
        {{ $programSumber->index }}
    </td>
    <td class="px-6 py-4 lg:table-cell">
        {{ $programSumber->name }}({{ $persenTargetProSum }}%)
    </td>
    <td class="px-6 py-4 lg:table-cell">
        Rp. {{ $nominalTargetProSum }}
    </td>
    <td class="px-6 py-4 lg:table-cell">
        {{ $nominalRealisasiProSum }}
    </td>
</tr>
