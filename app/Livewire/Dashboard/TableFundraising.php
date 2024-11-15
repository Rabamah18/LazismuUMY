<?php

namespace App\Livewire\Dashboard;

use App\Models\Penghimpunan;
use App\Models\TargetProgramSumber;
use App\Models\TargetSubInfaq;
use App\Models\TargetSumberDonasi;
use App\Models\TargetTahunan as ModelTargetTahunan;
use Livewire\Component;

class TableFundraising extends Component
{
    public $tahunx = 5;

    public $proSum;

    public function getPersenProSum(int $tahunx, string $proSum)
    {
        return TargetProgramSumber::query()
            ->whereHas('ProgramSumber', function ($query) use ($proSum) {
                $query->where('name', $proSum);
            })
            ->where('tahun_id', $tahunx)
            ->sum('nominal');
    }

    public function getRealisasiProsum(int $tahunx, string $proSum)
    {
        return Penghimpunan::query()
            ->whereHas('programSumber', function ($query) use ($proSum) {
                $query->where('name', $proSum);
            })
            ->where('tahun_id', $tahunx)
            ->where('pindahdana', false)
            ->sum('nominal');
    }

    public function render()
    {
        $targetTahunx = ModelTargetTahunan::query()
            ->where('tahun_id', $this->tahunx)
            ->where('jenis', 'penghimpunan')
            ->sum('nominal');

        $targetPersenZakat = TargetSumberDonasi::query()
            ->whereHas('sumberDonasi', function ($query) {
                $query->where('name', 'zakat');
            })
            ->where('tahun_id', $this->tahunx)
            ->sum('nominal');

        $targetPersenInfaq = TargetSumberDonasi::query()
            ->whereHas('sumberDonasi', function ($query) {
                $query->where('name', 'infaq');
            })
            ->where('tahun_id', $this->tahunx)
            ->sum('nominal');

        $targetPersenInfaqNR = TargetSubInfaq::query()
            ->where('tahun_id', $this->tahunx)
            ->where('jenis', 'infaqnonrutin')
            ->sum('nominal');

        $targetPersenInfaqR = TargetSubInfaq::query()
            ->where('tahun_id', $this->tahunx)
            ->where('jenis', 'infaqrutin')
            ->sum('nominal');

        $targetPersenZakatMaal = $this->getPersenProSum($this->tahunx, 'Zakat Maal');

        $targetPersenZakatFitrah = $this->getPersenProSum($this->tahunx, 'Zakat Fitrah');

        $targetPersenZakatProfesi = $this->getPersenProSum($this->tahunx, 'Zakat Profesi');

        $targetPersenZakatMuzaki = $this->getPersenProSum($this->tahunx, 'Zakat Muzaki request Mustahiq');

        $targetPersenInfaqBSi = $this->getPersenProSum($this->tahunx, 'Infaq Shodaqoh BSI');

        $targetPersenInfaqQrisBsi = $this->getPersenProSum($this->tahunx, 'Qris BSI');

        $targetPersenInfaqBpd = $this->getPersenProSum($this->tahunx, 'infaq Shodaqoh BPD');

        $targetPersenInfaqQrisBpd = $this->getPersenProSum($this->tahunx, 'Qris BPD');

        $targetPersenInfaqKencleng = $this->getPersenProSum($this->tahunx, 'Kencleng');

        $targetPersenProgramEskternal = $this->getPersenProSum($this->tahunx, 'Program Eskternal');

        $targetPersenProgramInternal = $this->getPersenProSum($this->tahunx, 'Program Internal');

        $targetPersenBagiHasilBpd = $this->getPersenProSum($this->tahunx, 'BAGI HASIL BPD');

        $targetPersenQurban = $this->getPersenProSum($this->tahunx, 'QURBAN');

        $targetPersenInfaqRefund = $this->getPersenProSum($this->tahunx, 'INFAQ REFUND');

        $targetPersenDonasi = $this->getPersenProSum($this->tahunx, 'DONASI');

        $targetPersenTakjil = $this->getPersenProSum($this->tahunx, 'takjil');

        $targetPersenFidyah = $this->getPersenProSum($this->tahunx, 'fidyah');

        $targetPersenJumatBerkah = $this->getPersenProSum($this->tahunx, 'Jumat Berkah');

        $targetPersenInfaqTakmirKampus = $this->getPersenProSum($this->tahunx, 'Infaq Takmir Masjid Kampus');

        $targetPersenInfaqStandAcara = $this->getPersenProSum($this->tahunx, 'Infaq Stand Acara');

        $targetPersenPotInfaqGaji = $this->getPersenProSum($this->tahunx, 'Pot Infaq Gaji Dosen dan Tentik');

        $targetPersenPotInfaqHrkbk = $this->getPersenProSum($this->tahunx, 'Pot Infaq HR KBK');

        $targetPersenPotInfaqKaryawan = $this->getPersenProSum($this->tahunx, 'Pot Infaq Karyawan Lazismu');

        $nominalTargetZakat = ($targetTahunx * $targetPersenZakat) / 100;
        $nominalTargetZakatMaal = ($nominalTargetZakat * $targetPersenZakatMaal) / 100;
        $nominalTargetZakatFitrah = ($nominalTargetZakat * $targetPersenZakatFitrah) / 100;
        $nominalTargetZakatProfesi = ($nominalTargetZakat * $targetPersenZakatProfesi) / 100;
        $nominalTargetZakatMuzaki = ($nominalTargetZakat * $targetPersenZakatMuzaki) / 100;

        $nominalTargetInfaq = ($targetTahunx * $targetPersenInfaq) / 100;
        $nominalTargetInfaqNonRutin = ($nominalTargetInfaq * $targetPersenInfaqNR) / 100;
        $nominalTargetInfaqRutin = ($nominalTargetInfaq * $targetPersenInfaqR) / 100;
        $nominalTargetInfaqBsi = ($nominalTargetInfaqNonRutin * $targetPersenInfaqBSi) / 100;
        $nominalTargetQrisBsi = ($nominalTargetInfaqNonRutin * $targetPersenInfaqQrisBsi) / 100;
        $nominalTargetInfaqBpd = ($nominalTargetInfaqNonRutin * $targetPersenInfaqBpd) / 100;
        $nominalTargetQrisBpd = ($nominalTargetInfaqNonRutin * $targetPersenInfaqQrisBpd) / 100;
        $nominalTargetKencleng = ($nominalTargetInfaqNonRutin * $targetPersenInfaqKencleng) / 100;
        $nominalTargetProgramEskternal = ($nominalTargetInfaqNonRutin * $targetPersenProgramEskternal) / 100;
        $nominalTargetProgramInternal = ($nominalTargetInfaqNonRutin * $targetPersenProgramInternal) / 100;
        $nominalTargetBagiHasilBpd = ($nominalTargetInfaqNonRutin * $targetPersenBagiHasilBpd) / 100;
        $nominalTargetQurban = ($nominalTargetInfaqNonRutin * $targetPersenQurban) / 100;
        $nominalTargetInfaqRefund = ($nominalTargetInfaqNonRutin * $targetPersenInfaqRefund) / 100;
        $nominalTargetDonasi = ($nominalTargetInfaqNonRutin * $targetPersenDonasi) / 100;
        $nominalTargetTakjil = ($nominalTargetInfaqNonRutin * $targetPersenTakjil) / 100;
        $nominalTargetFidyah = ($nominalTargetInfaqNonRutin * $targetPersenFidyah) / 100;
        $nominalTargetJumatBerkah = ($nominalTargetInfaqNonRutin * $targetPersenJumatBerkah) / 100;
        $nominalTargetInfaqTakmirKampus = ($nominalTargetInfaqNonRutin * $targetPersenInfaqTakmirKampus) / 100;
        $nominalTargetInfaqStandAcara = ($nominalTargetInfaqNonRutin * $targetPersenInfaqStandAcara) / 100;
        $nominalTargetPotInfaqGajiDosen = ($nominalTargetInfaqRutin * $targetPersenPotInfaqGaji) / 100;
        $nominalTargetPotInfaqHrkbk = ($nominalTargetInfaqRutin * $targetPersenPotInfaqHrkbk) / 100;
        $nominalTargetPotInfaqKaryawan = ($nominalTargetInfaqRutin * $targetPersenPotInfaqKaryawan) / 100;

        $realisasiZakatMaal = $this->getRealisasiProsum($this->tahunx, 'Zakat Maal');

        $realisasiZakatFitrah = $this->getRealisasiProsum($this->tahunx, 'Zakat Fitrah');

        $realisasiZakatProfesi = $this->getRealisasiProsum($this->tahunx, 'Zakat Profesi');

        $realisasiZakatMuzaki = $this->getRealisasiProsum($this->tahunx, 'Zakat Muzaki request Mustahiq');

        $realisasiDanaTitipan = $this->getRealisasiProsum($this->tahunx, 'Dana Titipan');

        $realisasiInfaqBSi = $this->getRealisasiProsum($this->tahunx, 'Infaq Shodaqoh BSI');

        $realisasiInfaqQrisBsi = $this->getRealisasiProsum($this->tahunx, 'Qris BSI');

        $realisasiInfaqBpd = $this->getRealisasiProsum($this->tahunx, 'infaq Shodaqoh BPD');

        $realisasiInfaqQrisBpd = $this->getRealisasiProsum($this->tahunx, 'Qris BPD');

        $realisasiInfaqKencleng = $this->getRealisasiProsum($this->tahunx, 'Kencleng');

        $realisasiProgramEskternal = $this->getRealisasiProsum($this->tahunx, 'Program Eskternal');

        $realisasiProgramInternal = $this->getRealisasiProsum($this->tahunx, 'Program Internal');

        $realisasiBagiHasilBpd = $this->getRealisasiProsum($this->tahunx, 'BAGI HASIL BPD');

        $realisasiQurban = $this->getRealisasiProsum($this->tahunx, 'QURBAN');

        $realisasiInfaqRefund = $this->getRealisasiProsum($this->tahunx, 'INFAQ REFUND');

        $realisasiDonasi = $this->getRealisasiProsum($this->tahunx, 'DONASI');

        $realisasiTakjil = $this->getRealisasiProsum($this->tahunx, 'takjil');

        $realisasiFidyah = $this->getRealisasiProsum($this->tahunx, 'fidyah');

        $realisasiJumatBerkah = $this->getRealisasiProsum($this->tahunx, 'Jumat Berkah');

        $realisasiInfaqTakmirKampus = $this->getRealisasiProsum($this->tahunx, 'Infaq Takmir Masjid Kampus');

        $realisasiInfaqStandAcara = $this->getRealisasiProsum($this->tahunx, 'Infaq Stand Acara');

        $realisasiPotInfaqGaji = $this->getRealisasiProsum($this->tahunx, 'Pot Infaq Gaji Dosen dan Tentik');

        $realisasiPotInfaqHrkbk = $this->getRealisasiProsum($this->tahunx, 'Pot Infaq HR KBK');

        $realisasiPotInfaqKaryawan = $this->getRealisasiProsum($this->tahunx, 'Pot Infaq Karyawan Lazismu');

        $totalRealisasiZakat = $realisasiZakatMaal + $realisasiZakatFitrah + $realisasiZakatProfesi + $realisasiZakatMuzaki;

        $totalRealisasiInfaqNonRutin = $realisasiDanaTitipan + $realisasiInfaqBSi + $realisasiInfaqQrisBsi + $realisasiInfaqBpd + $realisasiInfaqQrisBpd + $realisasiInfaqKencleng + $realisasiProgramEskternal + $realisasiProgramInternal + $realisasiBagiHasilBpd + $realisasiQurban + $realisasiInfaqRefund + $realisasiDonasi + $realisasiTakjil + $realisasiFidyah + $realisasiJumatBerkah + $realisasiInfaqTakmirKampus + $realisasiInfaqStandAcara;

        $totalRealisasiInfaqRutin = $realisasiPotInfaqGaji + $realisasiPotInfaqHrkbk + $realisasiPotInfaqKaryawan;

        $totalRealisasiInfaq = $totalRealisasiInfaqNonRutin + $totalRealisasiInfaqRutin;

        $totalRealisasiZakatInfaq = $totalRealisasiZakat + $totalRealisasiInfaq;

        $persenRealisasiZakat = ($totalRealisasiZakat / $nominalTargetZakat) / 100;
        $persenRealisasiInfaqNonRutin = ($totalRealisasiInfaqNonRutin / $nominalTargetInfaqNonRutin) / 100;
        $persenRealisasiInfaqRutin = ($totalRealisasiInfaqRutin / $nominalTargetInfaqRutin) / 100;

        return view('livewire.dashboard.table-fundraising', compact(
            'targetTahunx',
            'targetPersenZakat',
            'targetPersenInfaq',
            'targetPersenInfaqNR',
            'targetPersenInfaqR',
            'targetPersenZakatMaal',
            'targetPersenZakatFitrah',
            'targetPersenZakatProfesi',
            'targetPersenZakatMuzaki',
            'targetPersenInfaqBSi',
            'targetPersenInfaqQrisBsi',
            'targetPersenInfaqBpd',
            'targetPersenInfaqQrisBpd',
            'targetPersenInfaqKencleng',
            'targetPersenProgramEskternal',
            'targetPersenProgramInternal',
            'targetPersenBagiHasilBpd',
            'targetPersenQurban',
            'targetPersenInfaqRefund',
            'targetPersenDonasi',
            'targetPersenTakjil',
            'targetPersenFidyah',
            'targetPersenJumatBerkah',
            'targetPersenInfaqTakmirKampus',
            'targetPersenInfaqStandAcara',
            'targetPersenPotInfaqGaji',
            'targetPersenPotInfaqHrkbk',
            'targetPersenPotInfaqKaryawan',
            'nominalTargetZakat',
            'nominalTargetZakatMaal',
            'nominalTargetZakatFitrah',
            'nominalTargetZakatProfesi',
            'nominalTargetZakatMuzaki',
            'nominalTargetInfaq',
            'nominalTargetInfaqNonRutin',
            'nominalTargetInfaqRutin',
            'nominalTargetInfaqBsi',
            'nominalTargetQrisBsi',
            'nominalTargetInfaqBpd',
            'nominalTargetQrisBpd',
            'nominalTargetKencleng',
            'nominalTargetProgramEskternal',
            'nominalTargetProgramInternal',
            'nominalTargetBagiHasilBpd',
            'nominalTargetQurban',
            'nominalTargetInfaqRefund',
            'nominalTargetDonasi',
            'nominalTargetTakjil',
            'nominalTargetFidyah',
            'nominalTargetJumatBerkah',
            'nominalTargetInfaqTakmirKampus',
            'nominalTargetInfaqStandAcara',
            'nominalTargetPotInfaqGajiDosen',
            'nominalTargetPotInfaqHrkbk',
            'nominalTargetPotInfaqKaryawan',
            'realisasiZakatMaal',
            'realisasiZakatFitrah',
            'realisasiZakatProfesi',
            'realisasiZakatMuzaki',
            'realisasiDanaTitipan',
            'realisasiInfaqBSi',
            'realisasiInfaqQrisBsi',
            'realisasiInfaqBpd',
            'realisasiInfaqQrisBpd',
            'realisasiInfaqKencleng',
            'realisasiProgramEskternal',
            'realisasiProgramInternal',
            'realisasiBagiHasilBpd',
            'realisasiQurban',
            'realisasiInfaqRefund',
            'realisasiDonasi',
            'realisasiTakjil',
            'realisasiFidyah',
            'realisasiJumatBerkah',
            'realisasiInfaqTakmirKampus',
            'realisasiInfaqStandAcara',
            'realisasiPotInfaqGaji',
            'realisasiPotInfaqHrkbk',
            'realisasiPotInfaqKaryawan',
            'totalRealisasiZakat',
            'totalRealisasiInfaqNonRutin',
            'totalRealisasiInfaqRutin',
            'totalRealisasiInfaq',
            'totalRealisasiZakatInfaq',
            'persenRealisasiZakat',
            'persenRealisasiInfaqNonRutin',
            'persenRealisasiInfaqRutin',
        ));
    }
}
