<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Provinsi::factory()->count(39)->sequence(
        //     ['name' => 'Nanggroe Aceh Darussalam'],
        //     ['name' => 'Sumatera Utara'],
        //     ['name' => 'Sumatera Selatan'],
        //     ['name' => 'Sumatera Barat'],
        //     ['name' => 'Bengkulu'],
        //     ['name' => 'Riau'],
        //     ['name' => 'Kepulauan Riau'],
        //     ['name' => 'Jambi'],
        //     ['name' => 'Lampung'],
        //     ['name' => 'Bangka Belitung'],
        //     ['name' => 'Kalimantan Barat'],
        //     ['name' => 'Kalimantan Timur'],
        //     ['name' => 'Kalimantan Selatan'],
        //     ['name' => 'Kalimantan Tengah'],
        //     ['name' => 'Kalimantan Utara'],
        //     ['name' => 'Banten'],
        //     ['name' => 'DKI Jakarta'],
        //     ['name' => 'Jawa Barat'],
        //     ['name' => 'Jawa Tengah'],
        //     ['name' => 'Daerah Istimewa Yogyakarta'],
        //     ['name' => 'Jawa Timur'],
        //     ['name' => 'Bali'],
        //     ['name' => 'Nusa Tenggara Timur'],
        //     ['name' => 'Nusa Tenggara Barat'],
        //     ['name' => 'Gorontalo'],
        //     ['name' => 'Sulawesi Barat'],
        //     ['name' => 'Sulawesi Tengah'],
        //     ['name' => 'Sulawesi Utara'],
        //     ['name' => 'Sulawesi Tenggara'],
        //     ['name' => 'Sulawesi Selatan'],
        //     ['name' => 'Maluku Utara'],
        //     ['name' => 'Maluku'],
        //     ['name' => 'Papua Barat'],
        //     ['name' => 'Papua'],
        //     ['name' => 'Papua Tengah'],
        //     ['name' => 'Papua Pegunungan'],
        //     ['name' => 'Papua Selatan'],
        //     ['name' => 'Papua Barat Daya'],
        //     //Luar Negeri
        //     ['name' => 'Luar Negeri']
        // )->create();

        $provinsi = [
            'Aceh (NAD)' => [
                'Aceh Barat',
                'Aceh Besar',
                'Pidie',
                'Aceh Utara',
                'Simeulue',
                'Aceh Singkil',
                'Bireuen',
                'Aceh Barat Daya',
                'Gayo Lues',
                'Aceh Jaya',
                'Nagan Raya',
                'Aceh Tamiang',
                'Bener Meriah',
                'Pidie Jaya',
                'Kota Banda Aceh',
                'Kota Sabang',
                'Kota Lhokseumawe',
                'Kota Langsa',
                'Kota Subulussalam',
            ],
            'Sumatera Utara' => [
                'Tapanuli Tengah',
                'Tapanuli Utara',
                'Tapanuli Selatan',
                'Nias',
                'Langkat',
                'Karo',
                'Deli Serdang',
                'Simalungun',
                'Asahan',
                'Labuhanbatu',
                'Dairi',
                'Toba',
                'Mandailing Natal',
                'Nias Selatan',
                'Pakpak Bharat',
                'Humbang Hasundutan',
                'Samosir',
                'Serdang Bedagai',
                'Batu Bara',
                'Padang Lawas Utara',
                'Padang Lawas',
                'Labuhanbatu Selatan',
                'Labuhanbatu Utara',
                'Nias Utara',
                'Nias Barat',
                'Kota Medan',
                'Kota Pematangsiantar',
                'Kota Sibolga',
                'Kota Tanjung Balai',
                'Kota Binjai',
                'Kota Tebing Tinggi',
                'Kota Padangsidimpuan',
                'Kota Gunungsitoli',
            ],
            'Sumatera Barat' => [
                'Pesisir Selatan',
                'Solok',
                'Sijunjung',
                'Tanah Datar',
                'Padang Pariaman',
                'Agam',
                'Lima Puluh Kota',
                'Pasaman',
                'Kepulauan Mentawai',
                'Dharmasraya',
                'Solok Selatan',
                'Pasaman Barat',
                'Kota Padang',
                'Kota Solok',
                'Kota Sawahlunto',
                'Kota Padang Panjang',
                'Kota Bukittinggi',
                'Kota Payakumbuh',
                'Kota Pariaman',
            ],
            'Riau' => [
                'Kampar',
                'Indragiri Hulu',
                'Bengkalis',
                'Indragiri Hilir',
                'Pelalawan',
                'Rokan Hulu',
                'Rokan Hilir',
                'Siak',
                'Kuantan Singingi',
                'Kepulauan Meranti',
                'Kota Pekanbaru',
                'Kota Dumai',
            ],
            'Jambi' => [
                'Kerinci',
                'Merangin',
                'Sarolangun',
                'Batanghari',
                'Muaro Jambi',
                'Tanjung Jabung Barat',
                'Tanjung Jabung Timur',
                'Bungo',
                'Tebo',
                'Kota Jambi',
                'Kota Sungai Penuh',
            ],
            'Sumatera Selatan' => [
                'Ogan Komering Ulu',
                'Ogan Komering Ilir',
                'Muara Enim',
                'Lahat',
                'Musi Rawas',
                'Musi Banyuasin',
                'Banyuasin',
                'Ogan Komering Ulu Timur',
                'Ogan Komering Ulu Selatan',
                'Ogan Ilir',
                'Empat Lawang',
                'Penukal Abab Lematang Ilir',
                'Musi Rawas Utara',
                'Kota Palembang',
                'Kota Pagar Alam',
                'Kota Lubuk Linggau',
                'Kota Prabumulih',
            ],
            'Bengkulu' => [
                'Bengkulu Selatan',
                'Rejang Lebong',
                'Bengkulu Utara',
                'Kaur',
                'Seluma',
                'Muko Muko',
                'Lebong',
                'Kepahiang',
                'Bengkulu Tengah',
                'Kota Bengkulu',
            ],
            'Lampung' => [
                'Lampung Selatan',
                'Lampung Tengah',
                'Lampung Utara',
                'Lampung Barat',
                'Tulang Bawang',
                'Tanggamus',
                'Lampung Timur',
                'Way Kanan',
                'Pesawaran',
                'Pringsewu',
                'Mesuji',
                'Tulang Bawang Barat',
                'Pesisir Barat',
                'Kota Bandar Lampung',
                'Kota Metro',
            ],
            'Kepulauan Bangka Belitung' => [
                'Bangka',
                'Belitung',
                'Bangka Selatan',
                'Bangka Tengah',
                'Bangka Barat',
                'Belitung Timur',
                'Kota Pangkal Pinang',
            ],
            'Kepulauan Riau' => [
                'Bintan',
                'Karimun',
                'Natuna',
                'Lingga',
                'Kepulauan Anambas',
                'Kota Batam',
                'Kota Tanjung Pinang',
            ],
            'DKI Jakarta' => [
                'Kepulauan Seribu',
                'Kota Jakarta Pusat',
                'Kota Jakarta Utara',
                'Kota Jakarta Barat',
                'Kota Jakarta Selatan',
                'Kota Jakarta Timur',
            ],
            'Jawa Barat' => [
                'Bogor',
                'Sukabumi',
                'Cianjur',
                'Bandung',
                'Garut',
                'Tasikmalaya',
                'Ciamis',
                'Kuningan',
                'Cirebon',
                'Majalengka',
                'Sumedang',
                'Indramayu',
                'Subang',
                'Purwakarta',
                'Karawang',
                'Bekasi',
                'Bandung Barat',
                'Pangandaran',
                'Kota Bogor',
                'Kota Sukabumi',
                'Kota Bandung',
                'Kota Cirebon',
                'Kota Bekasi',
                'Kota Depok',
                'Kota Cimahi',
                'Kota Tasikmalaya',
                'Kota Banjar',
            ],
            'Jawa Tengah' => [
                'Cilacap',
                'Banyumas',
                'Purbalingga',
                'Banjarnegara',
                'Kebumen',
                'Purworejo',
                'Wonosobo',
                'Magelang',
                'Boyolali',
                'Klaten',
                'Sukoharjo',
                'Wonogiri',
                'Karanganyar',
                'Sragen',
                'Grobogan',
                'Blora',
                'Rembang',
                'Pati',
                'Kudus',
                'Jepara',
                'Demak',
                'Semarang',
                'Temanggung',
                'Kendal',
                'Batang',
                'Pekalongan',
                'Pemalang',
                'Tegal',
                'Brebes',
                'Kota Magelang',
                'Kota Surakarta',
                'Kota Salatiga',
                'Kota Semarang',
                'Kota Pekalongan',
                'Kota Tegal',
            ],
            'DI Yogyakarta' => [
                'Kulon Progo',
                'Bantul',
                'Gunungkidul',
                'Sleman',
                'Kota Yogyakarta',
            ],
            'Jawa Timur' => [
                'Pacitan',
                'Ponorogo',
                'Trenggalek',
                'Tulungagung',
                'Blitar',
                'Kediri',
                'Malang',
                'Lumajang',
                'Jember',
                'Banyuwangi',
                'Bondowoso',
                'Situbondo',
                'Probolinggo',
                'Pasuruan',
                'Sidoarjo',
                'Mojokerto',
                'Jombang',
                'Nganjuk',
                'Madiun',
                'Magetan',
                'Ngawi',
                'Bojonegoro',
                'Tuban',
                'Lamongan',
                'Gresik',
                'Bangkalan',
                'Sampang',
                'Pamekasan',
                'Sumenep',
                'Kota Kediri',
                'Kota Blitar',
                'Kota Malang',
                'Kota Probolinggo',
                'Kota Pasuruan',
                'Kota Mojokerto',
                'Kota Madiun',
                'Kota Surabaya',
                'Kota Batu',
            ],
            'Banten' => [
                'Pandeglang',
                'Lebak',
                'Tangerang',
                'Serang',
                'Kota Tangerang',
                'Kota Cilegon',
                'Kota Serang',
                'Kota Tangerang Selatan',
            ],
            'Bali' => [
                'Jembrana',
                'Tabanan',
                'Badung',
                'Gianyar',
                'Klungkung',
                'Bangli',
                'Karangasem',
                'Buleleng',
                'Kota Denpasar',
            ],
            'Nusa Tenggara Barat (NTB)' => [
                'Lombok Barat',
                'Lombok Tengah',
                'Lombok Timur',
                'Sumbawa',
                'Dompu',
                'Bima',
                'Sumbawa Barat',
                'Lombok Utara',
                'Kota Mataram',
                'Kota Bima',
            ],
            'Nusa Tenggara Timur (NTT)' => [
                'Kupang',
                'Timor Tengah Selatan',
                'Timor Tengah Utara',
                'Belu',
                'Alor',
                'Flores Timur',
                'Sikka',
                'Ende',
                'Ngada',
                'Manggarai',
                'Sumba Timur',
                'Sumba Barat',
                'Lembata',
                'Rote Ndao',
                'Manggarai Barat',
                'Nagekeo',
                'Sumba Tengah',
                'Sumba Barat Daya',
                'Manggarai Timur',
                'Sabu Raijua',
                'Malaka',
                'Kota Kupang',
            ],
            'Kalimantan Barat' => [
                'Sambas',
                'Mempawah',
                'Sanggau',
                'Ketapang',
                'Sintang',
                'Kapuas Hulu',
                'Bengkayang',
                'Landak',
                'Sekadau',
                'Melawi',
                'Kayong Utara',
                'Kubu Raya',
                'Kota Pontianak',
                'Kota Singkawang',
            ],
            'Kalimantan Tengah' => [
                'Kotawaringin Barat',
                'Kotawaringin Timur',
                'Kapuas',
                'Barito Selatan',
                'Barito Utara',
                'Katingan',
                'Seruyan',
                'Sukamara',
                'Lamandau',
                'Gunung Mas',
                'Pulang Pisau',
                'Murung Raya',
                'Barito Timur',
                'Kota Palangkaraya',
            ],
            'Kalimantan Selatan' => [
                'Tanah Laut',
                'Kotabaru',
                'Banjar',
                'Barito Kuala',
                'Tapin',
                'Hulu Sungai Selatan',
                'Hulu Sungai Tengah',
                'Hulu Sungai Utara',
                'Tabalong',
                'Tanah Bumbu',
                'Balangan',
                'Kota Banjarmasin',
                'Kota Banjarbaru',
            ],
            'Kalimantan Timur' => [
                'Paser',
                'Kutai Kartanegara',
                'Berau',
                'Kutai Barat',
                'Kutai Timur',
                'Penajam Paser Utara',
                'Mahakam Ulu',
                'Kota Balikpapan',
                'Kota Samarinda',
                'Kota Bontang',
            ],
            'Kalimantan Utara' => [
                'Bulungan',
                'Malinau',
                'Nunukan',
                'Tana Tidung',
                'Kota Tarakan',
            ],
            'Sulawesi Utara' => [
                'Bolaang Mongondow',
                'Minahasa',
                'Kepulauan Sangihe',
                'Kepulauan Talaud',
                'Minahasa Selatan',
                'Minahasa Utara',
                'Minahasa Tenggara',
                'Bolaang Mongondow Utara',
                'Kepulauan Siau Tagulandang Biaro (Sitaro)',
                'Bolaang Mongondow Timur',
                'Bolaang Mongondow Selatan',
                'Kota Manado',
                'Kota Bitung',
                'Kota Tomohon',
                'Kota Kotamobagu',
            ],
            'Sulawesi Tengah' => [
                'Banggai',
                'Poso',
                'Donggala',
                'Toli Toli',
                'Buol',
                'Morowali',
                'Banggai Kepulauan',
                'Parigi Moutong',
                'Tojo Una Una',
                'Sigi',
                'Banggai Laut',
                'Morowali Utara',
                'Kota Palu',
            ],
            'Sulawesi Selatan' => [
                'Kepulauan Selayar',
                'Bulukumba',
                'Bantaeng',
                'Jeneponto',
                'Takalar',
                'Gowa',
                'Sinjai',
                'Bone',
                'Maros',
                'Pangkajene Kepulauan',
                'Barru',
                'Soppeng',
                'Wajo',
                'Sidenreng Rappang',
                'Pinrang',
                'Enrekang',
                'Luwu',
                'Tana Toraja',
                'Luwu Utara',
                'Luwu Timur',
                'Toraja Utara',
                'Kota Makassar',
                'Kota Pare Pare',
                'Kota Palopo',
            ],
            'Sulawesi Tenggara' => [
                'Kolaka',
                'Konawe',
                'Muna',
                'Buton',
                'Konawe Selatan',
                'Bombana',
                'Wakatobi',
                'Kolaka Utara',
                'Konawe Utara',
                'Buton Utara',
                'Kolaka Timur',
                'Konawe Kepulauan',
                'Muna Barat',
                'Buton Tengah',
                'Buton Selatan',
                'Kota Kendari',
                'Kota Bau Bau',
            ],
            'Gorontalo' => [
                'Gorontalo',
                'Boalemo',
                'Bone Bolango',
                'Pahuwato',
                'Gorontalo Utara',
                'Kota Gorontalo',
            ],
            'Sulawesi Barat' => [
                'Pasangkayu (Mamuju Utara)',
                'Mamuju',
                'Mamasa',
                'Polewali Mandar',
                'Majene',
                'Mamuju Tengah',
            ],
            'Maluku' => [
                'Maluku Tengah',
                'Maluku Tenggara',
                'Kepulauan Tanimbar (Maluku Tenggara Barat)',
                'Buru',
                'Seram Bagian Timur',
                'Seram Bagian Barat',
                'Kepulauan Aru',
                'Maluku Barat Daya',
                'Buru Selatan',
                'Kota Ambon',
                'Kota Tual',
            ],
            'Maluku Utara' => [
                'Halmahera Barat',
                'Halmahera Tengah',
                'Halmahera Utara',
                'Halmahera Selatan',
                'Kepulauan Sula',
                'Halmahera Timur',
                'Pulau Morotai',
                'Pulau Taliabu',
                'Kota Ternate',
                'Kota Tidore Kepulauan',
            ],
            'Papua' => [
                'Jayapura',
                'Kepulauan Yapen',
                'Biak Numfor',
                'Sarmi',
                'Keerom',
                'Waropen',
                'Supiori',
                'Mamberamo Raya',
                'Kota Jayapura',
            ],
            'Papua Barat' => [
                'Manokwari',
                'Fak Fak',
                'Teluk Bintuni',
                'Teluk Wondama',
                'Kaimana',
                'Manokwari Selatan',
                'Pegunungan Arfak',
            ],
            'Papua Selatan' => [
                'Merauke',
                'Boven Digoel',
                'Mappi',
                'Asmat',
            ],
            'Papua Tengah' => [
                'Nabire',
                'Puncak Jaya',
                'Paniai',
                'Mimika',
                'Puncak',
                'Dogiyai',
                'Intan Jaya',
                'Deiyai',
            ],
            'Papua Pegunungan' => [
                'Jayawijaya',
                'Pegunungan Bintang',
                'Yahukimo',
                'Tolikara',
                'Mamberamo Tengah',
                'Yalimo',
                'Lanny Jaya',
                'Nduga',
            ],
            'Papua Barat Daya' => [
                'Sorong',
                'Sorong Selatan',
                'Raja Ampat',
                'Tambrauw',
                'Maybrat',
                'Kota Sorong',
            ],

            'Luar Negeri' => [
                'Afghanistan',
                'Afrika Selatan',
                'Akrotiri dan Dhekelia',
                'Albania',
                'Aljazair',
                'Amerika Serikat',
                'Andorra',
                'Angola',
                'Antigua dan Barbuda',
                'Arab Saudi',
                'Argentina',
                'Armenia',
                'Australia',
                'Austria',
                'Azerbaijan',
                'Bahama',
                'Bahrain',
                'Bangladesh',
                'Barbados',
                'Belanda',
                'Belarus',
                'Belgia',
                'Belize',
                'Benin',
                'Bermuda',
                'Bhutan',
                'Bolivia',
                'Bosnia dan Herzegovina',
                'Botswana',
                'Brasil',
                'Britania Raya',
                'Brunei Darussalam',
                'Bulgaria',
                'Burkina Faso',
                'Burundi',
                'Ceko',
                'Chad',
                'Chili',
                'Curacao',
                'Denmark',
                'Ekuador',
                'El Salvador',
                'Eritrea',
                'Estonia',
                'Eswatini',
                'Ethiopia',
                'Fiji',
                'Filipina',
                'Finlandia',
                'Gabon',
                'Gambia',
                'Georgia',
                'Ghana',
                'Greenland',
                'Grenada',
                'Guam',
                'Guatemala',
                'Guinea Bissau',
                'Guinea Ekuatorial',
                'Guinea',
                'Guyana',
                'Haiti',
                'Honduras',
                'Hungaria',
                'India',
                'Irak',
                'Iran',
                'Irlandia',
                'Islandia',
                'Israel',
                'Italia',
                'Jamaika',
                'Jepang',
                'Jerman',
                'Kamboja',
                'Kamerun',
                'Kanada',
                'Kazakhstan',
                'Kenya',
                'Kepualauan Marshall',
                'Kepualauan Solomon',
                'Kyrgyzstan',
                'Kiribati',
                'Kolombia',
                'Komoro',
                'Korea Selatan',
                'Korea Utara',
                'Kosta Rika',
                'Kroasia',
                'Kuba',
                'Kuwait',
                'Laos',
                'Latvia',
                'Lebanon',
                'Lesotho',
                'Liberia',
                'Libya',
                'Liechtenstein',
                'Lithuania',
                'Luxemburg',
                'Madagaskar',
                'Makedonia',
                'Maladewa',
                'Malawi',
                'Malaysia',
                'Mali',
                'Malta',
                'Maroko',
                'Mauritania',
                'Mauritius',
                'Makau',
                'Meksiko',
                'Mesir',
                'Mikronesia',
                'Moldova',
                'Monako',
                'Mongolia',
                'Montenegro',
                'Mozambik',
                'Myanmar',
                'Namibia',
                'Nauru',
                'Nepal',
                'Niger',
                'Nigeria',
                'Nikaragua',
                'Norwegia',
                'Oman',
                'Pakistan',
                'Palau',
                'Palestina',
                'Panama',
                'Pantai Gading',
                'Papua Nugini',
                'Paraguay',
                'Prancis',
                'Peru',
                'Polandia',
                'Portugal',
                'Qatar',
                'Republik Afrika Tengah',
                'Republik Demokrasi Kongo',
                'Republik Dominika',
                'Republik Kongo',
                'Republik Rakyat Tiongkok',
                'Rumania',
                'Rusia',
                'Rwanda',
                'Sahara Barat',
                'Saint Lucia',
                'Saint Vincent dan Grenadines',
                'Samoa',
                'San Marino',
                'Sao Tome dan Principe',
                'Selandia Baru',
                'Senegal',
                'Serbia',
                'Seychelles',
                'Sierra Leone',
                'Singapura',
                'Siprus',
                'Slovakia',
                'Slovenia',
                'Somalia',
                'Spanyol',
                'Sri Lanka',
                'St. Kitt & Nevis',
                'Sudan',
                'Suriah',
                'Suriname',
                'Swedia',
                'Swiss',
                'Taiwan',
                'Tajikistan',
                'Tanjung Verde',
                'Tanzania',
                'Thailand',
                'Timor Leste',
                'Togo',
                'Tonga',
                'Trinidad dan Tobago',
                'Tunisia',
                'Turki',
                'Turkmenistan',
                'Tuvalu',
                'Uganda',
                'Ukraina',
                'Uni Emirat Arab',
                'Uruguay',
                'Uzbekistan',
                'Vanuatu',
                'Vatikan',
                'Venezuela',
                'Vietnam',
                'Wales',
                'Yaman',
                'Yordania',
                'Yunani',
                'Zambia',
                'Zimbabwe',
            ]
        ];

        foreach ($provinsi as $provinsiName => $kabupaten) {
            $provinsi = Provinsi::factory()->create(['name' => $provinsiName]);
            foreach ($kabupaten as $kabupatenName) {
                $provinsi->kabupatens()->create(['name' => $kabupatenName]);
            }
        }
    }
}
