<x-main-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div x-data="{
        autoplayIntervalTime: 7000,
        slides: [{
                imgSrc: 'image/slider/Flayer-Web_Selamat-Datang.png',
                imgAlt: 'Flayer selamat datang Lazismu UMY.',
                title: 'Selamat Datang',
                description: 'Selamat Datang di Lazismu UMY',
                ctaUrl: '',
                ctaText: '',
            },
            // {
            //     imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
            //     imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
            //     title: 'Back end developers',
            //     description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',
            //     ctaUrl: 'https://example.com',
            //     ctaText: 'Become a Developer',
            // },
            // {
            //     imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
            //     imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
            //     title: 'Full stack developers',
            //     description: 'Where &quot;burnout&quot; is just a fancy term for &quot;Tuesday&quot;.',
            //     ctaUrl: 'https://example.com',
            //     ctaText: 'Become a Developer',
            // },
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
    }" x-init="autoplay" class="relative w-full overflow-hidden min-w-max group">
        <!-- previous button -->
        <button type="button"
            class="absolute z-10 flex items-center justify-center p-2 transition-opacity duration-300 -translate-y-1/2 rounded-full opacity-0 group-hover:opacity-100 left-5 top-1/2 bg-white/40 text-zinc-600 hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-zinc-950/40 dark:text-zinc-300 dark:hover:bg-zinc-950/60 dark:focus-visible:outline-white"
            aria-label="previous slide" x-on:click="previous()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- next button -->
        <button type="button"
            class="absolute z-10 flex items-center justify-center p-2 transition-opacity duration-300 -translate-y-1/2 rounded-full opacity-0 group-hover:opacity-100 right-5 top-1/2 bg-white/40 text-zinc-600 hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-zinc-950/40 dark:text-zinc-300 dark:hover:bg-zinc-950/60 dark:focus-visible:outline-white"
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
        <!-- Change aspect-[3/1] to match your images aspect ratio -->
        <div class="relative aspect-[3/1] w-full">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                    x-transition.opacity.duration.700ms>
                    <img class="absolute inset-0 object-cover w-full h-full text-zinc-600 dark:text-zinc-300"
                        x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
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

    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div
            class="grid overflow-hidden border border-gray-200 shadow-sm md:grid-cols-3 rounded-xl dark:border-neutral-800">
            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Program Donasi
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                35
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Total Dana Terkumpul
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 54.240.544.371
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Donatur Terdaftar
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                69592
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->

    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h2 class="pb-4 text-3xl text-gray-800 pfont-bold lg:text-4xl dark:text-white">
            6 Pilar Lazismu
        </h2>
        <div class="grid items-center gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card1 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Kemanusian.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Kemanusiaan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Lazismu selalu hadir dalam membantu masalah sosial
                            yang diakibatkan oleh faktor eksternal kehidupan mustahik.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card2 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Sosial_Dakwah.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Sosial Dakwah</h3>
                        <p class="text-gray-600 dark:text-gray-400">Pilar Dakwah memiliki fungsi menguatkan sisi ruhani
                            dan pemenuhan kebutuhan untuk kegiatan dakwah dengan tujuan kemandirian para da’i serta
                            institusi dakwah.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card3 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Lingkunan.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Lingkungan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Dalam mendistribusikan zakatmu dan infakmu, Lazismu
                            memiliki pilar lingkungan sebagai lembaga yang komitmen dalam peningkatan kualitas
                            lingkungan.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card4 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Pendidikan.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Pendidikan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Program pendidikan di Lazismu sebagai peningkatan
                            mutu Sumber Daya Manusia dengan menjalankan berbagai program di bidang pendidikan baik
                            pemenuhan sarana ataupun biaya pendidikan.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card5 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Kesehatan.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Kesehatan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Program kesehatan Lazismu hadir untuk memenuhi hak
                            mustahik dalam mendapatkan hidup yang berkualitas dengan terpenuhinya layanan kesehatan
                            serta protokol kesehatan.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card6 -->
            <a class="flex p-5 rounded-lg group gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                href="#">
                <img src="{{ asset('icon/icon_Ekonomi.png') }}" alt="Icon Pilar Kemanusiaan"
                    class="shrink-0 size-10 mt-0.5 me-6 rounded-full">

                <div>
                    <div>
                        <h3 class="block font-bold text-gray-800 dark:text-white">Ekonomi</h3>
                        <p class="text-gray-600 dark:text-gray-400">Program ekonomi bertujuan untuk meningkatkan
                            kesejahteraan penerima manfaat Zakat ataupun donasi lainnya. Dalam program ini melaksanakan
                            pola pemberdayaan, pelatihan serta pendampingan wirausaha.</p>
                    </div>

                    <p
                        class="inline-flex items-center mt-3 text-sm font-semibold text-gray-800 gap-x-1 dark:text-gray-200">
                        Learn more
                        <svg class="transition ease-in-out shrink-0 size-4 group-hover:translate-x-1 group-focus:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Icon Blocks -->
</x-main-layout>
