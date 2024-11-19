    <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
        <td class="justify-center w-2 py-4 pl-6 font-medium text-gray-900 dark:text-gray-200">
            {{ $sumberDana->index }}
        </td>
        <td class="px-6 py-4 lg:table-cell">
            {{ $sumberDana->name }}
        </td>
        @if ($sumberDonasi->name == 'Zakat')
            <td class="px-6 py-4 lg:table-cell">
                {{ $saldoPerSumberDana }}
            </td>
            <td class="px-6 py-4 lg:table-cell">-</td>
            <td class="px-6 py-4 lg:table-cell">-</td>
        @elseif ($sumberDonasi->name == 'Infaq')
            <td class="px-6 py-4 lg:table-cell">-</td>
            <td class="px-6 py-4 lg:table-cell">
                {{ $saldoPerSumberDana }}
            </td>
            <td class="px-6 py-4 lg:table-cell">-</td>
        @else
            <td class="px-6 py-4 lg:table-cell">-</td>
            <td class="px-6 py-4 lg:table-cell">-</td>
            <td class="px-6 py-4 lg:table-cell">
                {{ $saldoPerSumberDana }}
            </td>
        @endif
    </tr>
