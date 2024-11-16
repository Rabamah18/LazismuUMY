<?php

namespace App\Livewire\Dashboard;

use App\Models\Penyaluran;
use App\Models\TargetPilar;
use App\Models\TargetProgramPilar;
use App\Models\TargetTahunan;
use Livewire\Component;

class TableTasyaruf extends Component
{
    public $tahunx = 5;

    public function getPersenPilar(int $tahunx, string $pilar)
    {
        return TargetPilar::query()
            ->whereHas('pilar', function ($query) use ($pilar) {
                $query->where('name', $pilar);
            })
            ->where('tahun_id', $tahunx)
            ->sum('nominal');
    }

    public function getPersenProgramPilar(int $tahunx, string $proPil)
    {
        return TargetProgramPilar::query()
            ->whereHas('ProgramPilar', function ($query) use ($proPil) {
                $query->where('name', $proPil);
            })
            ->where('tahun_id', $tahunx)
            ->sum('nominal');
    }

    public function getRealisasiPropil(int $tahunx, string $proPil)
    {
        return Penyaluran::query()
            ->whereHas('programPilar', function ($query) use ($proPil) {
                $query->where('name', $proPil);
            })
            ->where('tahun_id', $tahunx)
            ->where('pindahdana', false)
            ->sum('nominal');
    }

    public function render()
    {
        $targetTahunx = TargetTahunan::query()
            ->where('tahun_id', $this->tahunx)
            ->where('jenis', 'penyaluran')
            ->sum('nominal');

        $targetPersenPendidikan = $this->getPersenPilar($this->tahunx, 'Pendidikan');
        $targetPersenKesehatan = $this->getPersenPilar($this->tahunx, 'Kesehatan');
        $targetPersenEkonomi = $this->getPersenPilar($this->tahunx, 'Ekonomi');
        $targetPersenKemanusiaan = $this->getPersenPilar($this->tahunx, 'Kemanusiaan');
        $targetPersenSosialDakwah = $this->getPersenPilar($this->tahunx, 'Sosial Dakwah');
        $targetPersenLingkungan = $this->getPersenPilar($this->tahunx, 'Lingkungan');
        $targetPersenOperasional = $this->getPersenPilar($this->tahunx, 'Operasional');

        $nominalTargetPendidikan = ($targetTahunx * $targetPersenPendidikan) / 100;
        $nominalTargetKesehatan = ($targetTahunx * $targetPersenKesehatan) / 100;
        $nominalTargetEkonomi = ($targetTahunx * $targetPersenEkonomi) / 100;
        $nominalTargetKemanusiaan = ($targetTahunx * $targetPersenKemanusiaan) / 100;
        $nominalTargetSosialDakwah = ($targetTahunx * $targetPersenSosialDakwah) / 100;
        $nominalTargetLingkungan = ($targetTahunx * $targetPersenLingkungan) / 100;
        $nominalTargetOperasional = ($targetTahunx * $targetPersenOperasional) / 100;

        $targetPersenBeasiswaSangSurya = $this->getPersenProgramPilar($this->tahunx, 'Beasiswa Sang Surya');
        $targetPersenBeasiswaMentari = $this->getPersenProgramPilar($this->tahunx, 'Beasiswa Mentari');
        $targetPersenSaveOurSchool = $this->getPersenProgramPilar($this->tahunx, 'Save Our School');
        $targetPersenPeduliGuru = $this->getPersenProgramPilar($this->tahunx, 'Peduli Guru');
        $targetPersenLazismuGoesToCampus = $this->getPersenProgramPilar($this->tahunx, 'Lazismu Goes To Campus');
        $targetPersenMuhammadiyahScholarship = $this->getPersenProgramPilar($this->tahunx, 'Muhammadiyah Scholarship Preparation Program (MSPP)');
        $targetPersenEdutab = $this->getPersenProgramPilar($this->tahunx, 'Edutab-mu');
        $targetPersenPerpusKeliling = $this->getPersenProgramPilar($this->tahunx, 'Perpus Keliling');
        $targetPersenPeduliKesehatan = $this->getPersenProgramPilar($this->tahunx, 'Peduli Kesehatan');
        $targetPersenIndonesiaMobileClinic = $this->getPersenProgramPilar($this->tahunx, 'Indonesia Mobile Clinic');
        $targetPersenSAUM = $this->getPersenProgramPilar($this->tahunx, 'SAUM');
        $targetPersenTimbang = $this->getPersenProgramPilar($this->tahunx, 'Timbang');
        $targetPersenENDTB = $this->getPersenProgramPilar($this->tahunx, 'END-TB');
        $targetPersenRumahSinggahPasien = $this->getPersenProgramPilar($this->tahunx, 'Rumah Singgah Pasien');
        $targetPersenKhitan = $this->getPersenProgramPilar($this->tahunx, 'Khitan');
        $targetPersenBebasCovid19 = $this->getPersenProgramPilar($this->tahunx, 'Bebas Covid-19');
        $targetPersenBedahKlinik = $this->getPersenProgramPilar($this->tahunx, 'Bedah Klinik');
        $targetPersenPemberdayaanUMKM = $this->getPersenProgramPilar($this->tahunx, 'Pemberdayaan UMKM');
        $targetPersenPeternakanMasyarakatMandiri = $this->getPersenProgramPilar($this->tahunx, 'Peternakan Masyarakat Mandiri');
        $targetPersenTaniBangkit = $this->getPersenProgramPilar($this->tahunx, 'Tani Bangkit');
        $targetPersenKetahananPangan = $this->getPersenProgramPilar($this->tahunx, 'Ketahanan Pangan');
        $targetPersenKeuanganMikro = $this->getPersenProgramPilar($this->tahunx, 'Keuangan Mikro');
        $targetPersenSiagaBencana = $this->getPersenProgramPilar($this->tahunx, 'Siaga Bencana');
        $targetPersenSekolahCerdas = $this->getPersenProgramPilar($this->tahunx, 'Sekolah Cerdas');
        $targetPersenMuhammadiyahAID = $this->getPersenProgramPilar($this->tahunx, 'Muhammadiyah AID');
        $targetPersenGudangKemanusiaanLazismu = $this->getPersenProgramPilar($this->tahunx, 'Gudang Kemanusiaan Lazismu');
        $targetPersenPensiunan = $this->getPersenProgramPilar($this->tahunx, 'Pensiunan');
        $targetPersenBantuanTenagaTendik = $this->getPersenProgramPilar($this->tahunx, 'Bantuan Tenaga Tendik');
        $targetPersenPemberdayaanDisabilitas = $this->getPersenProgramPilar($this->tahunx, 'Pemberdayaan Disabilitas');
        $targetPersenSayangiLansia = $this->getPersenProgramPilar($this->tahunx, 'Sayangi Lansia');
        $targetPersenPemberdayaanMualaf = $this->getPersenProgramPilar($this->tahunx, 'Pemberdayaan Mualaf');
        $targetPersenBedahRumah = $this->getPersenProgramPilar($this->tahunx, 'Bedah Rumah');
        $targetPersenBacktoMasjid = $this->getPersenProgramPilar($this->tahunx, 'Back to Masjid');
        $targetPersenRumahTahfidz = $this->getPersenProgramPilar($this->tahunx, 'Rumah Tahfidz');
        $targetPersenIndonesiaTerang = $this->getPersenProgramPilar($this->tahunx, 'Indonesia Terang');
        $targetPersenTakjil = $this->getPersenProgramPilar($this->tahunx, 'Takjil');
        $targetPersenJumatBerkah = $this->getPersenProgramPilar($this->tahunx, 'Jumat Berkah');
        $targetPersenProgramRamadhan = $this->getPersenProgramPilar($this->tahunx, 'Program Ramadhan');
        $targetPersenDaiMandiri = $this->getPersenProgramPilar($this->tahunx, 'Dai Mandiri');
        $targetPersenQurban = $this->getPersenProgramPilar($this->tahunx, 'Qurban');
        $targetPersenZakatFitrah = $this->getPersenProgramPilar($this->tahunx, 'Zakat Fitrah');
        $targetPersenFidyah = $this->getPersenProgramPilar($this->tahunx, 'Fidyah');
        $targetPersenTaliAsih = $this->getPersenProgramPilar($this->tahunx, 'Tali Asih');
        $targetPersenPenanamanPohon = $this->getPersenProgramPilar($this->tahunx, 'Penanaman Pohon');
        $targetPersenSayangiDaratmu = $this->getPersenProgramPilar($this->tahunx, 'Sayangi Daratmu');
        $targetPersenSayangiLautmu = $this->getPersenProgramPilar($this->tahunx, 'Sayangi Lautmu');
        $targetPersenHonorariumBulanan = $this->getPersenProgramPilar($this->tahunx, 'Honorarium Bulanan (Gaji Rutin)');
        $targetPersenInsentifLembur = $this->getPersenProgramPilar($this->tahunx, 'Insentif Lembur');
        $targetPersenInsentifRapat = $this->getPersenProgramPilar($this->tahunx, 'Insentif Rapat');
        $targetPersenInsentifRelawan = $this->getPersenProgramPilar($this->tahunx, 'Insentif Relawan');
        $targetPersenInsentifKebersihan = $this->getPersenProgramPilar($this->tahunx, 'Insentif Kebersihan');
        $targetPersenInsentifPengurus = $this->getPersenProgramPilar($this->tahunx, 'Insentif Pengurus');
        $targetPersenPerjalananDinas = $this->getPersenProgramPilar($this->tahunx, 'Perjalanan Dinas');
        $targetPersenKonsumsiRapat = $this->getPersenProgramPilar($this->tahunx, 'Konsumsi Rapat');
        $targetPersenKonsumsiPantry = $this->getPersenProgramPilar($this->tahunx, 'Konsumsi Pantry');
        $targetPersenPerlengkapanKantor = $this->getPersenProgramPilar($this->tahunx, 'Perlengkapan Kantor');
        $targetPersenAdministrasiUmum = $this->getPersenProgramPilar($this->tahunx, 'Administrasi Umum');
        $targetPersenCetakFotocopydll = $this->getPersenProgramPilar($this->tahunx, 'Cetak, Fotocopy, dll');
        $targetPersenPelatihandanPengembanganSDM = $this->getPersenProgramPilar($this->tahunx, 'Pelatihan dan Pengembangan SDM');
        $targetPersenPembelianAset = $this->getPersenProgramPilar($this->tahunx, 'Pembelian Aset');

        $nominalTargetBeasiswaSangSurya = ($nominalTargetPendidikan * $targetPersenBeasiswaSangSurya) / 100;
        $nominalTargetBeasiswaMentari = ($nominalTargetPendidikan * $targetPersenBeasiswaMentari) / 100;
        $nominalTargetSaveOurSchool = ($nominalTargetPendidikan * $targetPersenSaveOurSchool) / 100;
        $nominalTargetPeduliGuru = ($nominalTargetPendidikan * $targetPersenPeduliGuru) / 100;
        $nominalTargetLazismuGoesToCampus = ($nominalTargetPendidikan * $targetPersenLazismuGoesToCampus) / 100;
        $nominalTargetMuhammadiyahScholarship = ($nominalTargetPendidikan * $targetPersenMuhammadiyahScholarship) / 100;
        $nominalTargetEdutab = ($nominalTargetPendidikan * $targetPersenEdutab) / 100;
        $nominalTargetPerpusKeliling = ($nominalTargetPendidikan * $targetPersenPerpusKeliling) / 100;

        $nominalTargetPeduliKesehatan = ($nominalTargetKesehatan * $targetPersenPeduliKesehatan) / 100;
        $nominalTargetIndonesiaMobileClinic = ($nominalTargetKesehatan * $targetPersenIndonesiaMobileClinic) / 100;
        $nominalTargetSAUM = ($nominalTargetKesehatan * $targetPersenSAUM) / 100;
        $nominalTargetTimbang = ($nominalTargetKesehatan * $targetPersenTimbang) / 100;
        $nominalTargetENDTB = ($nominalTargetKesehatan * $targetPersenENDTB) / 100;
        $nominalTargetRumahSinggahPasien = ($nominalTargetKesehatan * $targetPersenRumahSinggahPasien) / 100;
        $nominalTargetKhitan = ($nominalTargetKesehatan * $targetPersenKhitan) / 100;
        $nominalTargetBebasCovid19 = ($nominalTargetKesehatan * $targetPersenBebasCovid19) / 100;
        $nominalTargetBedahKlinik = ($nominalTargetKesehatan * $targetPersenBedahKlinik) / 100;

        $nominalTargetPemberdayaanUMKM = ($nominalTargetEkonomi * $targetPersenPemberdayaanUMKM) / 100;
        $nominalTargetPeternakanMasyarakatMandiri = ($nominalTargetEkonomi * $targetPersenPeternakanMasyarakatMandiri) / 100;
        $nominalTargetTaniBangkit = ($nominalTargetEkonomi * $targetPersenTaniBangkit) / 100;
        $nominalTargetKetahananPangan = ($nominalTargetEkonomi * $targetPersenKetahananPangan) / 100;
        $nominalTargetKeuanganMikro = ($nominalTargetEkonomi * $targetPersenKeuanganMikro) / 100;

        $nominalTargetSiagaBencana = ($nominalTargetKemanusiaan * $targetPersenSiagaBencana) / 100;
        $nominalTargetSekolahCerdas = ($nominalTargetKemanusiaan * $targetPersenSekolahCerdas) / 100;
        $nominalTargetMuhammadiyahAID = ($nominalTargetKemanusiaan * $targetPersenMuhammadiyahAID) / 100;
        $nominalTargetGudangKemanusiaanLazismu = ($nominalTargetKemanusiaan * $targetPersenGudangKemanusiaanLazismu) / 100;
        $nominalTargetPensiunan = ($nominalTargetKemanusiaan * $targetPersenPensiunan) / 100;
        $nominalTargetBantuanTenagaTendik = ($nominalTargetKemanusiaan * $targetPersenBantuanTenagaTendik) / 100;

        $nominalTargetPemberdayaanDisabilitas = ($nominalTargetSosialDakwah * $targetPersenPemberdayaanDisabilitas) / 100;
        $nominalTargetSayangiLansia = ($nominalTargetSosialDakwah * $targetPersenSayangiLansia) / 100;
        $nominalTargetPemberdayaanMualaf = ($nominalTargetSosialDakwah * $targetPersenPemberdayaanMualaf) / 100;
        $nominalTargetBedahRumah = ($nominalTargetSosialDakwah * $targetPersenBedahRumah) / 100;
        $nominalTargetBacktoMasjid = ($nominalTargetSosialDakwah * $targetPersenBacktoMasjid) / 100;
        $nominalTargetRumahTahfidz = ($nominalTargetSosialDakwah * $targetPersenRumahTahfidz) / 100;
        $nominalTargetIndonesiaTerang = ($nominalTargetSosialDakwah * $targetPersenIndonesiaTerang) / 100;
        $nominalTargetTakjil = ($nominalTargetSosialDakwah * $targetPersenTakjil) / 100;
        $nominalTargetJumatBerkah = ($nominalTargetSosialDakwah * $targetPersenJumatBerkah) / 100;
        $nominalTargetProgramRamadhan = ($nominalTargetSosialDakwah * $targetPersenProgramRamadhan) / 100;
        $nominalTargetDaiMandiri = ($nominalTargetSosialDakwah * $targetPersenDaiMandiri) / 100;
        $nominalTargetQurban = ($nominalTargetSosialDakwah * $targetPersenQurban) / 100;
        $nominalTargetZakatFitrah = ($nominalTargetSosialDakwah * $targetPersenZakatFitrah) / 100;
        $nominalTargetFidyah = ($nominalTargetSosialDakwah * $targetPersenFidyah) / 100;
        $nominalTargetTaliAsih = ($nominalTargetSosialDakwah * $targetPersenTaliAsih) / 100;

        $nominalTargetPenanamanPohon = ($nominalTargetLingkungan * $targetPersenPenanamanPohon) / 100;
        $nominalTargetSayangiDaratmu = ($nominalTargetLingkungan * $targetPersenSayangiDaratmu) / 100;
        $nominalTargetSayangiLautmu = ($nominalTargetLingkungan * $targetPersenSayangiLautmu) / 100;

        $nominalTargetHonorariumBulanan = ($nominalTargetOperasional * $targetPersenHonorariumBulanan) / 100;
        $nominalTargetInsentifLembur = ($nominalTargetOperasional * $targetPersenInsentifLembur) / 100;
        $nominalTargetInsentifRapat = ($nominalTargetOperasional * $targetPersenInsentifRapat) / 100;
        $nominalTargetInsentifRelawan = ($nominalTargetOperasional * $targetPersenInsentifRelawan) / 100;
        $nominalTargetInsentifKebersihan = ($nominalTargetOperasional * $targetPersenInsentifKebersihan) / 100;
        $nominalTargetInsentifPengurus = ($nominalTargetOperasional * $targetPersenInsentifPengurus) / 100;
        $nominalTargetPerjalananDinas = ($nominalTargetOperasional * $targetPersenPerjalananDinas) / 100;
        $nominalTargetKonsumsiRapat = ($nominalTargetOperasional * $targetPersenKonsumsiRapat) / 100;
        $nominalTargetKonsumsiPantry = ($nominalTargetOperasional * $targetPersenKonsumsiPantry) / 100;
        $nominalTargetPerlengkapanKantor = ($nominalTargetOperasional * $targetPersenPerlengkapanKantor) / 100;
        $nominalTargetAdministrasiUmum = ($nominalTargetOperasional * $targetPersenAdministrasiUmum) / 100;
        $nominalTargetCetakFotocopydll = ($nominalTargetOperasional * $targetPersenCetakFotocopydll) / 100;
        $nominalTargetPelatihandanPengembanganSDM = ($nominalTargetOperasional * $targetPersenPelatihandanPengembanganSDM) / 100;
        $nominalTargetPembelianAset = ($nominalTargetOperasional * $targetPersenPembelianAset) / 100;

        $nominalRealisasiBeasiswaSangSurya = $this->getRealisasiPropil($this->tahunx, 'Beasiswa Sang Surya');
        $nominalRealisasiBeasiswaMentari = $this->getRealisasiPropil($this->tahunx, 'Beasiswa Mentari');
        $nominalRealisasiSaveOurSchool = $this->getRealisasiPropil($this->tahunx, 'Save Our School');
        $nominalRealisasiPeduliGuru = $this->getRealisasiPropil($this->tahunx, 'Peduli Guru');
        $nominalRealisasiLazismuGoesToCampus = $this->getRealisasiPropil($this->tahunx, 'Lazismu Goes To Campus');
        $nominalRealisasiMuhammadiyahScholarship = $this->getRealisasiPropil($this->tahunx, 'Muhammadiyah Scholarship Preparation Program (MSPP)');
        $nominalRealisasiEdutab = $this->getRealisasiPropil($this->tahunx, 'Edutab-mu');
        $nominalRealisasiPerpusKeliling = $this->getRealisasiPropil($this->tahunx, 'Perpus Keliling');

        $nominalRealisasiPeduliKesehatan = $this->getRealisasiPropil($this->tahunx, 'Peduli Kesehatan');
        $nominalRealisasiIndonesiaMobileClinic = $this->getRealisasiPropil($this->tahunx, 'Indonesia Mobile Clinic');
        $nominalRealisasiSAUM = $this->getRealisasiPropil($this->tahunx, 'SAUM');
        $nominalRealisasiTimbang = $this->getRealisasiPropil($this->tahunx, 'Timbang');
        $nominalRealisasiENDTB = $this->getRealisasiPropil($this->tahunx, 'END-TB');
        $nominalRealisasiRumahSinggahPasien = $this->getRealisasiPropil($this->tahunx, 'Rumah Singgah Pasien');
        $nominalRealisasiKhitan = $this->getRealisasiPropil($this->tahunx, 'Khitan');
        $nominalRealisasiBebasCovid19 = $this->getRealisasiPropil($this->tahunx, 'Bebas Covid-19');
        $nominalRealisasiBedahKlinik = $this->getRealisasiPropil($this->tahunx, 'Bedah Klinik');

        $nominalRealisasiPemberdayaanUMKM = $this->getRealisasiPropil($this->tahunx, 'Pemberdayaan UMKM');
        $nominalRealisasiPeternakanMasyarakatMandiri = $this->getRealisasiPropil($this->tahunx, 'Peternakan Masyarakat Mandiri');
        $nominalRealisasiTaniBangkit = $this->getRealisasiPropil($this->tahunx, 'Tani Bangkit');
        $nominalRealisasiKetahananPangan = $this->getRealisasiPropil($this->tahunx, 'Ketahanan Pangan');
        $nominalRealisasiKeuanganMikro = $this->getRealisasiPropil($this->tahunx, 'Keuangan Mikro');

        $nominalRealisasiSiagaBencana = $this->getRealisasiPropil($this->tahunx, 'Siaga Bencana');
        $nominalRealisasiSekolahCerdas = $this->getRealisasiPropil($this->tahunx, 'Sekolah Cerdas');
        $nominalRealisasiMuhammadiyahAID = $this->getRealisasiPropil($this->tahunx, 'Muhammadiyah AID');
        $nominalRealisasiGudangKemanusiaanLazismu = $this->getRealisasiPropil($this->tahunx, 'Gudang Kemanusiaan Lazismu');
        $nominalRealisasiPensiunan = $this->getRealisasiPropil($this->tahunx, 'Pensiunan');
        $nominalRealisasiBantuanTenagaTendik = $this->getRealisasiPropil($this->tahunx, 'Bantuan Tenaga Tendik');

        $nominalRealisasiPemberdayaanDisabilitas = $this->getRealisasiPropil($this->tahunx, 'Pemberdayaan Disabilitas');
        $nominalRealisasiSayangiLansia = $this->getRealisasiPropil($this->tahunx, 'Sayangi Lansia');
        $nominalRealisasiPemberdayaanMualaf = $this->getRealisasiPropil($this->tahunx, 'Pemberdayaan Mualaf');
        $nominalRealisasiBedahRumah = $this->getRealisasiPropil($this->tahunx, 'Bedah Rumah');
        $nominalRealisasiBacktoMasjid = $this->getRealisasiPropil($this->tahunx, 'Back to Masjid');
        $nominalRealisasiRumahTahfidz = $this->getRealisasiPropil($this->tahunx, 'Rumah Tahfidz');
        $nominalRealisasiIndonesiaTerang = $this->getRealisasiPropil($this->tahunx, 'Indonesia Terang');
        $nominalRealisasiTakjil = $this->getRealisasiPropil($this->tahunx, 'Takjil');
        $nominalRealisasiJumatBerkah = $this->getRealisasiPropil($this->tahunx, 'Jumat Berkah');
        $nominalRealisasiProgramRamadhan = $this->getRealisasiPropil($this->tahunx, 'Program Ramadhan');
        $nominalRealisasiDaiMandiri = $this->getRealisasiPropil($this->tahunx, 'Dai Mandiri');
        $nominalRealisasiQurban = $this->getRealisasiPropil($this->tahunx, 'Qurban');
        $nominalRealisasiZakatFitrah = $this->getRealisasiPropil($this->tahunx, 'Zakat Fitrah');
        $nominalRealisasiFidyah = $this->getRealisasiPropil($this->tahunx, 'Fidyah');
        $nominalRealisasiTaliAsih = $this->getRealisasiPropil($this->tahunx, 'Tali Asih');

        $nominalRealisasiPenanamanPohon = $this->getRealisasiPropil($this->tahunx, 'Penanaman Pohon');
        $nominalRealisasiSayangiDaratmu = $this->getRealisasiPropil($this->tahunx, 'Sayangi Daratmu');
        $nominalRealisasiSayangiLautmu = $this->getRealisasiPropil($this->tahunx, 'Sayangi Lautmu');

        $nominalRealisasiHonorariumBulanan = $this->getRealisasiPropil($this->tahunx, 'Honorarium Bulanan (Gaji Rutin)');
        $nominalRealisasiInsentifLembur = $this->getRealisasiPropil($this->tahunx, 'Insentif Lembur');
        $nominalRealisasiInsentifRapat = $this->getRealisasiPropil($this->tahunx, 'Insentif Rapat');
        $nominalRealisasiInsentifRelawan = $this->getRealisasiPropil($this->tahunx, 'Insentif Relawan');
        $nominalRealisasiInsentifKebersihan = $this->getRealisasiPropil($this->tahunx, 'Insentif Kebersihan');
        $nominalRealisasiInsentifPengurus = $this->getRealisasiPropil($this->tahunx, 'Insentif Pengurus');
        $nominalRealisasiPerjalananDinas = $this->getRealisasiPropil($this->tahunx, 'Perjalanan Dinas');
        $nominalRealisasiKonsumsiRapat = $this->getRealisasiPropil($this->tahunx, 'Konsumsi Rapat');
        $nominalRealisasiKonsumsiPantry = $this->getRealisasiPropil($this->tahunx, 'Konsumsi Pantry');
        $nominalRealisasiPerlengkapanKantor = $this->getRealisasiPropil($this->tahunx, 'Perlengkapan Kantor');
        $nominalRealisasiAdministrasiUmum = $this->getRealisasiPropil($this->tahunx, 'Administrasi Umum');
        $nominalRealisasiCetakFotocopydll = $this->getRealisasiPropil($this->tahunx, 'Cetak, Fotocopy, dll');
        $nominalRealisasiPelatihandanPengembanganSDM = $this->getRealisasiPropil($this->tahunx, 'Pelatihan dan Pengembangan SDM');
        $nominalRealisasiPembelianAset = $this->getRealisasiPropil($this->tahunx, 'Pembelian Aset');

        $totalRealisasiPendidikan = $nominalRealisasiBeasiswaSangSurya + $nominalRealisasiBeasiswaMentari + $nominalRealisasiSaveOurSchool + $nominalRealisasiPeduliGuru + $nominalRealisasiLazismuGoesToCampus + $nominalRealisasiMuhammadiyahScholarship + $nominalRealisasiEdutab + $nominalRealisasiPerpusKeliling;
        $totalRealisasiKesehatan = $nominalRealisasiPeduliKesehatan + $nominalRealisasiIndonesiaMobileClinic + $nominalRealisasiSAUM + $nominalRealisasiTimbang + $nominalRealisasiENDTB + $nominalRealisasiRumahSinggahPasien + $nominalRealisasiKhitan + $nominalRealisasiBebasCovid19 + $nominalRealisasiBedahKlinik;
        $totalRealisasiEkonomi = $nominalRealisasiPemberdayaanUMKM + $nominalRealisasiPeternakanMasyarakatMandiri + $nominalRealisasiTaniBangkit + $nominalRealisasiKetahananPangan + $nominalRealisasiKeuanganMikro;
        $totalRealisasiKemanusiaan = $nominalRealisasiSiagaBencana + $nominalRealisasiSekolahCerdas + $nominalRealisasiMuhammadiyahAID + $nominalRealisasiGudangKemanusiaanLazismu + $nominalRealisasiPensiunan + $nominalRealisasiBantuanTenagaTendik;
        $totalRealisasiSosialDakwah = $nominalRealisasiPemberdayaanDisabilitas + $nominalRealisasiSayangiLansia + $nominalRealisasiPemberdayaanMualaf + $nominalRealisasiBedahRumah + $nominalRealisasiBacktoMasjid + $nominalRealisasiRumahTahfidz + $nominalRealisasiIndonesiaTerang + $nominalRealisasiTakjil + $nominalRealisasiJumatBerkah + $nominalRealisasiProgramRamadhan + $nominalRealisasiDaiMandiri + $nominalRealisasiQurban + $nominalRealisasiZakatFitrah + $nominalRealisasiFidyah + $nominalRealisasiTaliAsih;
        $totalRealisasiLingkungan = $nominalRealisasiPenanamanPohon + $nominalRealisasiSayangiDaratmu + $nominalRealisasiSayangiLautmu;
        $totalRealisasiOperasional = $nominalRealisasiHonorariumBulanan + $nominalRealisasiInsentifLembur + $nominalRealisasiInsentifRapat + $nominalRealisasiInsentifRelawan + $nominalRealisasiInsentifKebersihan + $nominalRealisasiInsentifPengurus + $nominalRealisasiPerjalananDinas + $nominalRealisasiKonsumsiRapat + $nominalRealisasiKonsumsiPantry + $nominalRealisasiPerlengkapanKantor + $nominalRealisasiAdministrasiUmum + $nominalRealisasiCetakFotocopydll + $nominalRealisasiPelatihandanPengembanganSDM + $nominalRealisasiPembelianAset;

        $totalSeluruhRealisasi = $totalRealisasiPendidikan + $totalRealisasiKesehatan + $totalRealisasiEkonomi + $totalRealisasiKemanusiaan + $totalRealisasiSosialDakwah + $totalRealisasiLingkungan + $totalRealisasiOperasional;

        return view('livewire.dashboard.table-tasyaruf', compact(
            'targetTahunx',
            'targetPersenPendidikan',
            'targetPersenKesehatan',
            'targetPersenEkonomi',
            'targetPersenKemanusiaan',
            'targetPersenSosialDakwah',
            'targetPersenLingkungan',
            'targetPersenOperasional',
            'nominalTargetPendidikan',
            'nominalTargetKesehatan',
            'nominalTargetEkonomi',
            'nominalTargetKemanusiaan',
            'nominalTargetSosialDakwah',
            'nominalTargetLingkungan',
            'nominalTargetOperasional',
            'targetPersenBeasiswaSangSurya',
            'targetPersenBeasiswaMentari',
            'targetPersenSaveOurSchool',
            'targetPersenPeduliGuru',
            'targetPersenLazismuGoesToCampus',
            'targetPersenMuhammadiyahScholarship',
            'targetPersenEdutab',
            'targetPersenPerpusKeliling',
            'targetPersenPeduliKesehatan',
            'targetPersenIndonesiaMobileClinic',
            'targetPersenSAUM',
            'targetPersenTimbang',
            'targetPersenENDTB',
            'targetPersenRumahSinggahPasien',
            'targetPersenKhitan',
            'targetPersenBebasCovid19',
            'targetPersenBedahKlinik',
            'targetPersenPemberdayaanUMKM',
            'targetPersenPeternakanMasyarakatMandiri',
            'targetPersenTaniBangkit',
            'targetPersenKetahananPangan',
            'targetPersenKeuanganMikro',
            'targetPersenSiagaBencana',
            'targetPersenSekolahCerdas',
            'targetPersenMuhammadiyahAID',
            'targetPersenGudangKemanusiaanLazismu',
            'targetPersenPensiunan',
            'targetPersenBantuanTenagaTendik',
            'targetPersenPemberdayaanDisabilitas',
            'targetPersenSayangiLansia',
            'targetPersenPemberdayaanMualaf',
            'targetPersenBedahRumah',
            'targetPersenBacktoMasjid',
            'targetPersenRumahTahfidz',
            'targetPersenIndonesiaTerang',
            'targetPersenTakjil',
            'targetPersenJumatBerkah',
            'targetPersenProgramRamadhan',
            'targetPersenDaiMandiri',
            'targetPersenQurban',
            'targetPersenZakatFitrah',
            'targetPersenFidyah',
            'targetPersenTaliAsih',
            'targetPersenPenanamanPohon',
            'targetPersenSayangiDaratmu',
            'targetPersenSayangiLautmu',
            'targetPersenHonorariumBulanan',
            'targetPersenInsentifLembur',
            'targetPersenInsentifRapat',
            'targetPersenInsentifRelawan',
            'targetPersenInsentifKebersihan',
            'targetPersenInsentifPengurus',
            'targetPersenPerjalananDinas',
            'targetPersenKonsumsiRapat',
            'targetPersenKonsumsiPantry',
            'targetPersenPerlengkapanKantor',
            'targetPersenAdministrasiUmum',
            'targetPersenCetakFotocopydll',
            'targetPersenPelatihandanPengembanganSDM',
            'targetPersenPembelianAset',
            'nominalTargetBeasiswaSangSurya',
            'nominalTargetBeasiswaMentari',
            'nominalTargetSaveOurSchool',
            'nominalTargetPeduliGuru',
            'nominalTargetLazismuGoesToCampus',
            'nominalTargetMuhammadiyahScholarship',
            'nominalTargetEdutab',
            'nominalTargetPerpusKeliling',
            'nominalTargetPeduliKesehatan',
            'nominalTargetIndonesiaMobileClinic',
            'nominalTargetSAUM',
            'nominalTargetTimbang',
            'nominalTargetENDTB',
            'nominalTargetRumahSinggahPasien',
            'nominalTargetKhitan',
            'nominalTargetBebasCovid19',
            'nominalTargetBedahKlinik',
            'nominalTargetPemberdayaanUMKM',
            'nominalTargetPeternakanMasyarakatMandiri',
            'nominalTargetTaniBangkit',
            'nominalTargetKetahananPangan',
            'nominalTargetKeuanganMikro',
            'nominalTargetSiagaBencana',
            'nominalTargetSekolahCerdas',
            'nominalTargetMuhammadiyahAID',
            'nominalTargetGudangKemanusiaanLazismu',
            'nominalTargetPensiunan',
            'nominalTargetBantuanTenagaTendik',
            'nominalTargetPemberdayaanDisabilitas',
            'nominalTargetSayangiLansia',
            'nominalTargetPemberdayaanMualaf',
            'nominalTargetBedahRumah',
            'nominalTargetBacktoMasjid',
            'nominalTargetRumahTahfidz',
            'nominalTargetIndonesiaTerang',
            'nominalTargetTakjil',
            'nominalTargetJumatBerkah',
            'nominalTargetProgramRamadhan',
            'nominalTargetDaiMandiri',
            'nominalTargetQurban',
            'nominalTargetZakatFitrah',
            'nominalTargetFidyah',
            'nominalTargetTaliAsih',
            'nominalTargetPenanamanPohon',
            'nominalTargetSayangiDaratmu',
            'nominalTargetSayangiLautmu',
            'nominalTargetHonorariumBulanan',
            'nominalTargetInsentifLembur',
            'nominalTargetInsentifRapat',
            'nominalTargetInsentifRelawan',
            'nominalTargetInsentifKebersihan',
            'nominalTargetInsentifPengurus',
            'nominalTargetPerjalananDinas',
            'nominalTargetKonsumsiRapat',
            'nominalTargetKonsumsiPantry',
            'nominalTargetPerlengkapanKantor',
            'nominalTargetAdministrasiUmum',
            'nominalTargetCetakFotocopydll',
            'nominalTargetPelatihandanPengembanganSDM',
            'nominalTargetPembelianAset',
            'nominalRealisasiBeasiswaSangSurya',
            'nominalRealisasiBeasiswaMentari',
            'nominalRealisasiSaveOurSchool',
            'nominalRealisasiPeduliGuru',
            'nominalRealisasiLazismuGoesToCampus',
            'nominalRealisasiMuhammadiyahScholarship',
            'nominalRealisasiEdutab',
            'nominalRealisasiPerpusKeliling',
            'nominalRealisasiPeduliKesehatan',
            'nominalRealisasiIndonesiaMobileClinic',
            'nominalRealisasiSAUM',
            'nominalRealisasiTimbang',
            'nominalRealisasiENDTB',
            'nominalRealisasiRumahSinggahPasien',
            'nominalRealisasiKhitan',
            'nominalRealisasiBebasCovid19',
            'nominalRealisasiBedahKlinik',
            'nominalRealisasiPemberdayaanUMKM',
            'nominalRealisasiPeternakanMasyarakatMandiri',
            'nominalRealisasiTaniBangkit',
            'nominalRealisasiKetahananPangan',
            'nominalRealisasiKeuanganMikro',
            'nominalRealisasiSiagaBencana',
            'nominalRealisasiSekolahCerdas',
            'nominalRealisasiMuhammadiyahAID',
            'nominalRealisasiGudangKemanusiaanLazismu',
            'nominalRealisasiPensiunan',
            'nominalRealisasiBantuanTenagaTendik',
            'nominalRealisasiPemberdayaanDisabilitas',
            'nominalRealisasiSayangiLansia',
            'nominalRealisasiPemberdayaanMualaf',
            'nominalRealisasiBedahRumah',
            'nominalRealisasiBacktoMasjid',
            'nominalRealisasiRumahTahfidz',
            'nominalRealisasiIndonesiaTerang',
            'nominalRealisasiTakjil',
            'nominalRealisasiJumatBerkah',
            'nominalRealisasiProgramRamadhan',
            'nominalRealisasiDaiMandiri',
            'nominalRealisasiQurban',
            'nominalRealisasiZakatFitrah',
            'nominalRealisasiFidyah',
            'nominalRealisasiTaliAsih',
            'nominalRealisasiPenanamanPohon',
            'nominalRealisasiSayangiDaratmu',
            'nominalRealisasiSayangiLautmu',
            'nominalRealisasiHonorariumBulanan',
            'nominalRealisasiInsentifLembur',
            'nominalRealisasiInsentifRapat',
            'nominalRealisasiInsentifRelawan',
            'nominalRealisasiInsentifKebersihan',
            'nominalRealisasiInsentifPengurus',
            'nominalRealisasiPerjalananDinas',
            'nominalRealisasiKonsumsiRapat',
            'nominalRealisasiKonsumsiPantry',
            'nominalRealisasiPerlengkapanKantor',
            'nominalRealisasiAdministrasiUmum',
            'nominalRealisasiCetakFotocopydll',
            'nominalRealisasiPelatihandanPengembanganSDM',
            'nominalRealisasiPembelianAset',
            'totalRealisasiPendidikan',
            'totalRealisasiKesehatan',
            'totalRealisasiEkonomi',
            'totalRealisasiKemanusiaan',
            'totalRealisasiSosialDakwah',
            'totalRealisasiLingkungan',
            'totalRealisasiOperasional',
            'totalSeluruhRealisasi',
        ));
    }
}
