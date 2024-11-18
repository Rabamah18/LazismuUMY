<div>
    <tr>
        <td>
            {{ $sumberDana->id }}
        </td>
        <td>
            {{ $sumberDana->name }}
        </td>
        @if ($sumberDonasi->name == 'Zakat')
            <td>
                {{ $saldoPerSumberDana }}
            </td>
            <td>-</td>
            <td>-</td>
        @elseif ($sumberDonasi->name == 'Infaq')
            <td>-</td>
            <td>
                {{ $saldoPerSumberDana }}
            </td>
            <td>-</td>
        @else
            <td>-</td>
            <td>-</td>
            <td>
                {{ $saldoPerSumberDana }}
            </td>
        @endif
    </tr>
</div>
