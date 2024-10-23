<x-main-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Program') }}
        </h2>
    </x-slot>

    <div x-data="{
        autoplayIntervalTime: 7000,
        slides: [{
                imgSrc: 'image/pilar/ilustrasi_Pilar_Kemanusiaan.JPG',
                imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                title: 'Pilar Kemanusiaan',
                description: 'Program yang diarahkan untuk penangguulangan bencana dan misi kemanusiaan, baik dalam bentuk kesiapsiagaan bencana, tanggap darurat, rehabilitasi, dan rekonstruksi yang dilakukan secara sistematik dan melibatkan mitra intenal Muhammadiyah dan eksternal. Program-program pada pilar kemanusiaan meliputi : Indonesia Siaga, Sekolah Cerdas, Muhammadiyah Aid.',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'image/pilar/ilustrasi_Pilar_Sosial_Dakwah.JPG',
                imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                title: 'Pilar Sosial Dakwah',
                description: 'Program yang diarahkan untuk meningkatkan layanan sosial Islam untuk menjangkau kelompok masyarakat rentan baik di daerah miskin perkotaan maupun di daerah -daerah terpencil dengan semangat dakwah Islam. Program Sosial Dakwah Lazismu UMY antara lain : 1. Pemberdayaan Disabilitas 2. Sayangi Lansia 3. Pemberdayaan Mualaf 4. Back To Masjid 5. Qurban​',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'image/pilar/ilustrasi_Pilar_Lingkungan.png',
                imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                title: 'Pilar Lingkungan',
                description: 'Program yang diarahkan untuk memelihara lingkungan dan sumber daya alam serta pemanfaatannya secara bijaksana dan mendorong keberlanjutan alam sebagai sumber penghidupan masyarakat. Program pada pilar lingkungan meliputi : 1. Peduli Lingkungan 2. Sayangi Daratmu 3. Sayangi Lautmu',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'image/pilar/ilustrasi_Pilar_Pendidikan.JPG',
                imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                title: 'Pilar Pendidikan',
                description: 'Pilar Pendidikan adalah pilar Lazismu UMY dalam menjalankan program fundraising dan penyaluran memiliki pilar pendidikan yang didasarkan pada prinsip-prinsip Muhammadiyah, yang mengedepankan pendidikan sebagai sarana pembentukan karakter dan peningkatan kualitas hidup umat. Berikut adalah deskripsi Program Lazismu UMY dalam pilar pendidikan: 1.Beasiswa Sang Surya 2.Beasiswa Mentari 3.Save Our School 4.Peduli Guru 5.Lazismu Goes To Campus 6.Muhammadiyah Scholarship Preparation Program (MSPP)',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'image/pilar/ilustrasi_Pilar_Kesehatan.JPG',
                imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                title: 'Pilar Kesehatan',
                description: 'Program yang diarahkan untuk meningkatkan layanan di bidang kesehatan masyarakat, khususnya di kalangan keluarga kurang mampu melalui tindakan kuratif maupun kegiatan preventif (berupa penyuluhan) maupun kampanye. Program Pilar Kesehatan Lazismu UMY antara lain : 1. Peduli Kesehatan 2. Indonesia Mobile Clinic 3. SAUM 4. TIMBANG 5. ENDTB 6. Rumah Singgah Pasien 7. Khitan Gratis',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'image/pilar/ilustrasi_Pilar_Ekonomi.JPG',
                imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                title: 'Pilar Ekonomi',
                description: 'Program yang diarahkan untuk mendorong kemandirian dan meningkatkan pendapatan dan kesejahteraan serta semangat kewirausahaan melalui kegiatan ekonomi dna pembentukan usaha yang halal dan memberdayakan. Program pada pilar ekonomi meliputi : 1. Pemberdayaan UMKM 2. Peternakan Masyarakat Mandiri 3. Tani Bangkit 4. Ketahanan Pangan',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
        ],
        currentSlideIndex: 1,
        isPaused: false,
        autoplayInterval: null,
        pauseTimeout: null,
        previous() {
            // Pause autoplay
            clearInterval(this.autoplayInterval);
            clearTimeout(this.pauseTimeout);
    
            if (this.currentSlideIndex > 1) {
                this.currentSlideIndex = this.currentSlideIndex - 1
            } else {
                // If it's the first slide, go to the last slide
                this.currentSlideIndex = this.slides.length
            }
    
            // Resume autoplay after 4000ms
            this.pauseTimeout = setTimeout(() => {
                this.autoplay();
            }, 8000);
        },
        next() {
            // Pause autoplay
            clearInterval(this.autoplayInterval);
            clearTimeout(this.pauseTimeout);
    
            if (this.currentSlideIndex < this.slides.length) {
                this.currentSlideIndex = this.currentSlideIndex + 1
            } else {
                // If it's the last slide, go to the first slide
                this.currentSlideIndex = 1
            }
    
            // Resume autoplay after 4000ms
            this.pauseTimeout = setTimeout(() => {
                this.autoplay();
            }, 8000);
        },
        autoplay() {
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.next()
                }
            }, this.autoplayIntervalTime)
        },
        // Updates interval time
        setAutoplayInterval(newIntervalTime) {
            clearInterval(this.autoplayInterval)
            this.autoplayIntervalTime = newIntervalTime
            this.autoplay()
        },
    }" x-init="autoplay"
        class="relative w-full px-4 pt-4 mx-auto overflow-hidden max-w-7xl sm:px-6 lg:px-8 group">
        <!-- previous button -->
        <button type="button"
            class="absolute z-10 flex items-center justify-center p-2 transition-opacity duration-300 -translate-y-1/2 rounded-full opacity-0 group-hover:opacity-100 left-7 lg:left-10 top-1/2 bg-white/40 text-zinc-600 hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-zinc-950/40 dark:text-zinc-300 dark:hover:bg-zinc-950/60 dark:focus-visible:outline-white"
            aria-label="previous slide" x-on:click="previous()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- next button -->
        <button type="button"
            class="absolute z-10 flex items-center justify-center p-2 transition-opacity duration-300 -translate-y-1/2 rounded-full opacity-0 group-hover:opacity-100 right-7 lg:right-10 top-1/2 bg-white/40 text-zinc-600 hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-zinc-950/40 dark:text-zinc-300 dark:hover:bg-zinc-950/60 dark:focus-visible:outline-white"
            aria-label="next slide" x-on:click="next()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <button type="button"
            class="absolute z-10 transition rounded-full opacity-50 bottom-3 md:bottom-5 right-5 text-white/75 dark:text-zinc-950/75 hover:opacity-100 focus-visible:opacity-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white active:outline-offset-0"
            aria-label="pause carousel" x-on:click="(isPaused = !isPaused), setAutoplayInterval(autoplayIntervalTime)"
            x-bind:aria-pressed="isPaused">
            <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true" class="size-7">
                <path fill-rule="evenodd"
                    d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                    clip-rule="evenodd">
            </svg>
            <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true" class="size-7">
                <path fill-rule="evenodd"
                    d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z"
                    clip-rule="evenodd">
            </svg>
        </button>

        <!-- slides -->
        <div class="relative w-full">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1"
                    class="bg-white border shadow-sm rounded-xl sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div
                        class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-md lg:max-w-xl">
                        <img class="absolute top-0 object-cover size-full start-0" x-bind:src="slide.imgSrc"
                            x-bind:alt="slide.imgAlt">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="flex flex-col h-full px-4 pt-4 pb-10 sm:p-7">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white" x-text="slide.title"></h3>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400" x-text="slide.description">
                            </p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- indicators -->
        <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-10 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/40 px-1.5 py-1 md:px-2 dark:bg-zinc-950/40"
            role="group" aria-label="slides">
            <template x-for="(slide, index) in slides">
                <button class="transition rounded-full cursor-pointer size-2 bg-zinc-600 dark:bg-zinc-300"
                    x-on:click="currentSlideIndex = index + 1"
                    x-bind:class="[currentSlideIndex === index + 1 ? 'bg-zinc-600 dark:bg-zinc-300' :
                        'bg-zinc-600/50 dark:bg-zinc-300/50'
                    ]"
                    x-bind:aria-label="'slide ' + (index + 1)"></button>
            </template>
        </div>
    </div>
</x-main-layout>
