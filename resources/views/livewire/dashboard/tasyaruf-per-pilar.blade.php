<div>
    <tr>
        <td></td>
        <td>
            Pilar {{ $pilar->name }} ({{ $persenPilar }}%)
        </td>
    </tr>
    @foreach ($programPilars as $programPilar)
        <livewire:dashboard.tasyaruf-per-program-pilar :selectedTahun="$this->selectedTahun" :nominalTargetPilar="$nominalTargetPilar" :programPilar="$programPilar"
            :key="$pilar->id" />
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td>
            Rp. {{ $nominalTargetPilar }}
        </td>
        <td>
            {{ $lembagaPilar }}
        </td>
        <td>
            {{ $lakiPilar }}
        </td>
        <td>
            {{ $perempuanPilar }}
        </td>
        <td>
            Rp. {{ $realisasiPilar }}
        </td>
    </tr>
</div>
