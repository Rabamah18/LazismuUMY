<x-main-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div x-data="{
        autoplayIntervalTime: 7000,
        slides: [{
                imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                title: 'Front end developers',
                description: 'The architects of the digital world, constantly battling against their mortal enemy – browser compatibility.',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                title: 'Back end developers',
                description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',
                ctaUrl: 'https://example.com',
                ctaText: 'Become a Developer',
            },
            {
                imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                title: 'Full stack developers',
                description: 'Where &quot;burnout&quot; is just a fancy term for &quot;Tuesday&quot;.',
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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <path d="M0 2.15738H0.842105V6.47214H0V2.15738Z" fill="#F68F28"></path>
                    <path d="M3.36841 20.7108H7.57893V22.0053H3.36841V20.7108Z" fill="#F68F28"></path>
                    <path
                        d="M1.6842 8.09617L3.32394 11.4569C3.35319 11.5168 3.36842 11.5829 3.36841 11.6499V12.9443H7.57894V10.3554C7.57894 10.2988 7.58983 10.2427 7.61099 10.1903C7.63215 10.138 7.66316 10.0904 7.70226 10.0503L8.92399 8.79834C9.03186 8.68842 9.11737 8.55767 9.17559 8.41365C9.23381 8.26964 9.26357 8.11522 9.26315 7.95934V7.3351H7.99999C7.88832 7.3351 7.78123 7.28964 7.70226 7.20872C7.6233 7.1278 7.57894 7.01806 7.57894 6.90362V1.72591C7.57894 1.61148 7.53458 1.50173 7.45562 1.42081C7.37665 1.33989 7.26956 1.29443 7.15789 1.29443C7.04622 1.29443 6.93912 1.33989 6.86016 1.42081C6.7812 1.50173 6.73684 1.61148 6.73684 1.72591V4.31477C6.73684 4.4292 6.69247 4.53895 6.61351 4.61987C6.53455 4.70078 6.42745 4.74624 6.31578 4.74624C6.20411 4.74624 6.09702 4.70078 6.01805 4.61987C5.93909 4.53895 5.89473 4.4292 5.89473 4.31477V1.72591C5.89473 1.61148 5.85037 1.50173 5.77141 1.42081C5.69244 1.33989 5.58535 1.29443 5.47368 1.29443C5.36201 1.29443 5.25491 1.33989 5.17595 1.42081C5.09699 1.50173 5.05262 1.61148 5.05262 1.72591V4.31477C5.05262 4.4292 5.00826 4.53895 4.9293 4.61987C4.85034 4.70078 4.74324 4.74624 4.63157 4.74624C4.5199 4.74624 4.41281 4.70078 4.33384 4.61987C4.25488 4.53895 4.21052 4.4292 4.21052 4.31477V1.72591C4.21052 1.61148 4.16616 1.50173 4.0872 1.42081C4.00823 1.33989 3.90114 1.29443 3.78947 1.29443C3.6778 1.29443 3.5707 1.33989 3.49174 1.42081C3.41278 1.50173 3.36841 1.61148 3.36841 1.72591V4.31477C3.36841 4.4292 3.32405 4.53895 3.24509 4.61987C3.16613 4.70078 3.05903 4.74624 2.94736 4.74624C2.83569 4.74624 2.7286 4.70078 2.64963 4.61987C2.57067 4.53895 2.52631 4.4292 2.52631 4.31477V1.72591C2.52631 1.61148 2.48195 1.50173 2.40299 1.42081C2.32402 1.33989 2.21693 1.29443 2.10526 1.29443C1.99359 1.29443 1.88649 1.33989 1.80753 1.42081C1.72856 1.50173 1.6842 1.61148 1.6842 1.72591V8.09617Z"
                        fill="#F68F28"></path>
                    <path
                        d="M16.233 0.431462C16.0809 0.431036 15.9302 0.461529 15.7897 0.521177C15.6491 0.580825 15.5215 0.668444 15.4142 0.778962L14.1925 2.031C14.1534 2.07106 14.107 2.10284 14.0559 2.12453C14.0048 2.14621 13.9501 2.15737 13.8948 2.15737H8.42108V6.47213H12.6316C12.697 6.47212 12.7615 6.48772 12.8199 6.5177L16.0995 8.19803H22.3158C22.4275 8.19803 22.5346 8.15257 22.6135 8.07165C22.6925 7.99074 22.7369 7.88099 22.7369 7.76655C22.7369 7.65212 22.6925 7.54237 22.6135 7.46145C22.5346 7.38054 22.4275 7.33508 22.3158 7.33508H19.7895C19.6778 7.33508 19.5707 7.28962 19.4918 7.2087C19.4128 7.12779 19.3685 7.01804 19.3685 6.9036C19.3685 6.78917 19.4128 6.67942 19.4918 6.5985C19.5707 6.51759 19.6778 6.47213 19.7895 6.47213H22.3158C22.4275 6.47213 22.5346 6.42667 22.6135 6.34575C22.6925 6.26483 22.7369 6.15509 22.7369 6.04065C22.7369 5.92622 22.6925 5.81647 22.6135 5.73555C22.5346 5.65463 22.4275 5.60917 22.3158 5.60917H19.7895C19.6778 5.60917 19.5707 5.56372 19.4918 5.4828C19.4128 5.40188 19.3685 5.29213 19.3685 5.1777C19.3685 5.06326 19.4128 4.95352 19.4918 4.8726C19.5707 4.79168 19.6778 4.74622 19.7895 4.74622H22.3158C22.4275 4.74622 22.5346 4.70076 22.6135 4.61985C22.6925 4.53893 22.7369 4.42918 22.7369 4.31475C22.7369 4.20031 22.6925 4.09056 22.6135 4.00965C22.5346 3.92873 22.4275 3.88327 22.3158 3.88327H19.7895C19.6778 3.88327 19.5707 3.83781 19.4918 3.75689C19.4128 3.67598 19.3685 3.56623 19.3685 3.45179C19.3685 3.33736 19.4128 3.22761 19.4918 3.14669C19.5707 3.06578 19.6778 3.02032 19.7895 3.02032H22.3158C22.4275 3.02032 22.5346 2.97486 22.6135 2.89394C22.6925 2.81302 22.7369 2.70328 22.7369 2.58884C22.7369 2.47441 22.6925 2.36466 22.6135 2.28374C22.5346 2.20283 22.4275 2.15737 22.3158 2.15737H17.2632C17.1515 2.15737 17.0444 2.11191 16.9655 2.03099C16.8865 1.95007 16.8421 1.84032 16.8421 1.72589V0.431462H16.233Z"
                        fill="#F68F28"></path>
                    <path
                        d="M5.47367 18.9849H2.94736C2.83569 18.9849 2.72859 19.0304 2.64963 19.1113C2.57067 19.1922 2.52631 19.302 2.52631 19.4164C2.52631 19.5308 2.57067 19.6406 2.64963 19.7215C2.72859 19.8024 2.83569 19.8479 2.94736 19.8479H7.99999C8.11166 19.8479 8.21876 19.8933 8.29772 19.9743C8.37668 20.0552 8.42104 20.1649 8.42104 20.2794V21.5738H9.03015C9.18227 21.5742 9.33297 21.5437 9.47351 21.4841C9.61406 21.4244 9.74166 21.3368 9.84894 21.2263L11.0707 19.9743C11.1098 19.9342 11.1562 19.9024 11.2073 19.8807C11.2584 19.859 11.3131 19.8479 11.3684 19.8479H15.1579V15.5331H12.6316C12.5662 15.5331 12.5017 15.5175 12.4433 15.4876L9.16373 13.8072H2.94736C2.83569 13.8072 2.72859 13.8527 2.64963 13.9336C2.57067 14.0145 2.52631 14.1243 2.52631 14.2387C2.52631 14.3531 2.57067 14.4629 2.64963 14.5438C2.72859 14.6247 2.83569 14.6702 2.94736 14.6702H5.47367C5.58534 14.6702 5.69244 14.7156 5.7714 14.7965C5.85037 14.8775 5.89473 14.9872 5.89473 15.1016C5.89473 15.2161 5.85037 15.3258 5.7714 15.4067C5.69244 15.4877 5.58534 15.5331 5.47367 15.5331H2.94736C2.83569 15.5331 2.72859 15.5786 2.64963 15.6595C2.57067 15.7404 2.52631 15.8502 2.52631 15.9646C2.52631 16.079 2.57067 16.1888 2.64963 16.2697C2.72859 16.3506 2.83569 16.3961 2.94736 16.3961H5.47367C5.58534 16.3961 5.69244 16.4415 5.7714 16.5225C5.85037 16.6034 5.89473 16.7131 5.89473 16.8276C5.89473 16.942 5.85037 17.0517 5.7714 17.1327C5.69244 17.2136 5.58534 17.259 5.47367 17.259H2.94736C2.83569 17.259 2.72859 17.3045 2.64963 17.3854C2.57067 17.4663 2.52631 17.5761 2.52631 17.6905C2.52631 17.8049 2.57067 17.9147 2.64963 17.9956C2.72859 18.0765 2.83569 18.122 2.94736 18.122H5.47367C5.58534 18.122 5.69244 18.1674 5.7714 18.2484C5.85037 18.3293 5.89473 18.439 5.89473 18.5535C5.89473 18.6679 5.85037 18.7776 5.7714 18.8586C5.69244 18.9395 5.58534 18.9849 5.47367 18.9849Z"
                        fill="#F68F28"></path>
                    <path d="M17.6842 0H21.8947V1.29443H17.6842V0Z" fill="#F68F28"></path>
                    <path
                        d="M21.4737 20.7109C21.5853 20.7107 21.6923 20.6652 21.7713 20.5843C21.8502 20.5035 21.8946 20.3938 21.8947 20.2794V15.1017C21.8947 14.9872 21.9391 14.8775 22.0181 14.7966C22.097 14.7157 22.2041 14.6702 22.3158 14.6702H23.579V14.046C23.5794 13.8901 23.5496 13.7357 23.4914 13.5916C23.4332 13.4476 23.3477 13.3169 23.2398 13.2069L22.0181 11.955C21.979 11.9149 21.948 11.8673 21.9268 11.815C21.9056 11.7626 21.8947 11.7065 21.8947 11.6499V9.061H17.6842V10.3554C17.6842 10.4224 17.669 10.4885 17.6397 10.5484L16 13.9091V20.2794C16 20.3938 16.0444 20.5036 16.1233 20.5845C16.2023 20.6654 16.3094 20.7109 16.4211 20.7109C16.5327 20.7109 16.6398 20.6654 16.7188 20.5845C16.7977 20.5036 16.8421 20.3938 16.8421 20.2794V17.6905C16.8421 17.5761 16.8865 17.4663 16.9654 17.3854C17.0444 17.3045 17.1515 17.259 17.2632 17.259C17.3748 17.259 17.4819 17.3045 17.5609 17.3854C17.6399 17.4663 17.6842 17.5761 17.6842 17.6905V20.2794C17.6842 20.3938 17.7286 20.5036 17.8075 20.5845C17.8865 20.6654 17.9936 20.7109 18.1053 20.7109C18.2169 20.7109 18.324 20.6654 18.403 20.5845C18.482 20.5036 18.5263 20.3938 18.5263 20.2794V17.6905C18.5263 17.5761 18.5707 17.4663 18.6496 17.3854C18.7286 17.3045 18.8357 17.259 18.9474 17.259C19.059 17.259 19.1661 17.3045 19.2451 17.3854C19.3241 17.4663 19.3684 17.5761 19.3684 17.6905V20.2794C19.3684 20.3938 19.4128 20.5036 19.4918 20.5845C19.5707 20.6654 19.6778 20.7109 19.7895 20.7109C19.9012 20.7109 20.0082 20.6654 20.0872 20.5845C20.1662 20.5036 20.2105 20.3938 20.2105 20.2794V17.6905C20.2105 17.5761 20.2549 17.4663 20.3339 17.3854C20.4128 17.3045 20.5199 17.259 20.6316 17.259C20.7433 17.259 20.8504 17.3045 20.9293 17.3854C21.0083 17.4663 21.0526 17.5761 21.0526 17.6905V20.2794C21.0528 20.3938 21.0972 20.5035 21.1761 20.5843C21.255 20.6652 21.3621 20.7107 21.4737 20.7109V20.7109Z"
                        fill="#F68F28"></path>
                    <path d="M22.7368 15.5331H24V19.8479H22.7368V15.5331Z" fill="#F68F28"></path>
                    <path
                        d="M10.7274 11.7284L12.2105 12.9443L13.6937 11.7284C13.8762 11.5788 14.0095 11.3754 14.0757 11.1457C14.1419 10.916 14.1378 10.671 14.0639 10.4438C14.0238 10.3209 13.9538 10.2105 13.8605 10.1231C13.7671 10.0357 13.6535 9.97418 13.5304 9.94441C13.4073 9.91464 13.2789 9.91759 13.1572 9.95299C13.0356 9.98838 12.9248 10.055 12.8353 10.1466L12.2105 10.7869L11.5858 10.1466C11.4963 10.055 11.3855 9.98838 11.2639 9.95299C11.1422 9.91759 11.0138 9.91464 10.8907 9.94441C10.7676 9.97418 10.654 10.0357 10.5606 10.1231C10.4673 10.2105 10.3973 10.3209 10.3572 10.4438C10.2833 10.671 10.2792 10.916 10.3454 11.1457C10.4116 11.3754 10.5449 11.5788 10.7274 11.7284V11.7284Z"
                        fill="#F68F28"></path>
                </svg>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <path
                        d="M21.2669 1.21218C20.5304 0.168839 19.1093 -0.111537 18.0318 0.574204L12.7059 3.96343V7.34729L21.6434 1.74555L21.2669 1.21218Z"
                        fill="#F68F28"></path>
                    <path
                        d="M11.2941 3.96342L5.96822 0.574195C4.89067 -0.111499 3.46963 0.168784 2.73312 1.21217L2.3566 1.74558L11.2941 7.34723V3.96342Z"
                        fill="#F68F28"></path>
                    <path d="M10.6708 8.62271L0 1.93466V5.46407L7.34936 10.7045L10.6708 8.62271Z" fill="#F68F28">
                    </path>
                    <path
                        d="M14.8235 13.7413V15.202L13.3175 16.1575L19.0588 19.8005H24V16.9769L16.7012 12.4023L14.8235 13.7413Z"
                        fill="#F68F28"></path>
                    <path d="M0 16.9769V19.8005H4.94118L13.4118 14.4258V13.014L24 5.46407V1.93466L0 16.9769Z"
                        fill="#F68F28"></path>
                </svg>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <path
                        d="M12 1.87396C10.7302 0.414047 9.43462 -0.00731066 8.48442 9.55588e-05C5.98937 0.0195486 4.26569 2.49098 4.26569 5.01073C4.26569 7.50391 6.73829 9.60572 9.86868 12.2658C10.4077 12.7244 12 14.1005 12 14.1005C12 14.1005 13.5924 12.7245 14.1314 12.2658C17.2618 9.60572 19.7344 7.50391 19.7344 5.01073C19.7344 2.47813 17.982 0.0305642 15.5156 0.00431429C14.5677 -0.00576379 13.2726 0.412359 12 1.87396ZM14.1094 8.48443H12.7032V9.89068H11.2969V8.48443H9.89066V7.07819H11.2969V5.67195H12.7032V7.07819H14.1094V8.48443Z"
                        fill="#F68F28"></path>
                    <path
                        d="M21.8437 9.31409V10.0313C21.8155 12.0703 21.6327 14.7 19.2281 16.5281C18.6797 16.95 17.9906 17.3156 17.1749 17.6391C17.1187 17.5266 16.7249 16.4719 16.6687 16.3172C17.189 16.1204 17.6811 15.8813 18.2296 15.5157C19.6077 14.3485 19.7202 13.8 19.6218 13.5469C19.4531 13.125 18.539 13.2376 18.089 13.3219C16.7812 13.5751 15.0656 14.4328 13.9828 15.5157C13.2234 16.2047 12.7031 17.0766 12.7031 18.061V24H18.3281V23.2969C18.3281 21.6656 18.975 21.1407 20.0437 20.3532C21.689 19.1297 24 17.4563 24 10.5938V5.67197H23.546C21.8458 5.67197 21.8733 7.72433 21.8437 9.31409Z"
                        fill="#F68F28"></path>
                    <path
                        d="M5.67191 23.2969V24H11.2969V18.061C11.2969 17.0766 10.7766 16.2047 10.0173 15.5157C8.9344 14.4328 7.21874 13.5751 5.91098 13.3219C5.46098 13.2376 4.54697 13.1251 4.37822 13.5469C4.27978 13.8 4.39228 14.3484 5.7704 15.5157C6.31883 15.8813 6.81102 16.1204 7.33133 16.3172C7.27513 16.4719 6.88133 17.5266 6.82508 17.6391C6.00941 17.3156 5.3204 16.9499 4.77192 16.5281C2.36729 14.7 2.18447 12.0704 2.1563 10.0313V9.31409C2.12668 7.72433 2.15424 5.67197 0.453997 5.67197H6.10352e-05V10.5938C6.10352e-05 17.4563 2.31099 19.1297 3.95634 20.3531C5.02499 21.1406 5.67191 21.6656 5.67191 23.2969Z"
                        fill="#F68F28"></path>
                </svg>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <g clip-path="url(#clip0)">
                        <path
                            d="M23.5308 6.0166L12.234 2.03077C12.0826 1.97733 11.9175 1.97733 11.7661 2.03077L0.469219 6.0166C0.188344 6.11569 0.000375562 6.381 5.61892e-07 6.67885C-0.000374438 6.97669 0.186985 7.24243 0.467626 7.34218L11.7645 11.3583C11.8407 11.3854 11.9204 11.3989 12 11.3989C12.0797 11.3989 12.1593 11.3854 12.2355 11.3583L23.5324 7.34218C23.813 7.24243 24.0003 6.97669 24 6.67885C23.9996 6.381 23.8117 6.11569 23.5308 6.0166Z"
                            fill="#F68F28"></path>
                        <path
                            d="M22.3112 15.4019V9.26877L20.905 9.76869V15.4019C20.4814 15.6457 20.196 16.1025 20.196 16.6263C20.196 17.1501 20.4814 17.6069 20.905 17.8507V21.3062C20.905 21.6945 21.2198 22.0093 21.6081 22.0093C21.9964 22.0093 22.3112 21.6945 22.3112 21.3062V17.8508C22.7348 17.607 23.0202 17.1501 23.0202 16.6264C23.0202 16.1025 22.7348 15.6457 22.3112 15.4019Z"
                            fill="#F68F28"></path>
                        <path
                            d="M12 12.8052C11.7586 12.8052 11.5209 12.7642 11.2935 12.6833L4.94269 10.4256V13.5197C4.94269 14.2767 5.73239 14.9169 7.28986 15.4224C8.64741 15.863 10.3202 16.1057 12 16.1057C13.6798 16.1057 15.3525 15.863 16.7101 15.4224C18.2676 14.9169 19.0573 14.2767 19.0573 13.5197V10.4256L12.7066 12.6833C12.4791 12.7642 12.2414 12.8052 12 12.8052Z"
                            fill="#F68F28"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="24" height="24" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <path
                        d="M12 1.87396C10.7302 0.414047 9.43462 -0.00731066 8.48442 9.55588e-05C5.98937 0.0195486 4.26569 2.49098 4.26569 5.01073C4.26569 7.50391 6.73829 9.60572 9.86868 12.2658C10.4077 12.7244 12 14.1005 12 14.1005C12 14.1005 13.5924 12.7245 14.1314 12.2658C17.2618 9.60572 19.7344 7.50391 19.7344 5.01073C19.7344 2.47813 17.982 0.0305642 15.5156 0.00431429C14.5677 -0.00576379 13.2726 0.412359 12 1.87396ZM14.1094 8.48443H12.7032V9.89068H11.2969V8.48443H9.89066V7.07819H11.2969V5.67195H12.7032V7.07819H14.1094V8.48443Z"
                        fill="#F68F28"></path>
                    <path
                        d="M21.8437 9.31409V10.0313C21.8155 12.0703 21.6327 14.7 19.2281 16.5281C18.6797 16.95 17.9906 17.3156 17.1749 17.6391C17.1187 17.5266 16.7249 16.4719 16.6687 16.3172C17.189 16.1204 17.6811 15.8813 18.2296 15.5157C19.6077 14.3485 19.7202 13.8 19.6218 13.5469C19.4531 13.125 18.539 13.2376 18.089 13.3219C16.7812 13.5751 15.0656 14.4328 13.9828 15.5157C13.2234 16.2047 12.7031 17.0766 12.7031 18.061V24H18.3281V23.2969C18.3281 21.6656 18.975 21.1407 20.0437 20.3532C21.689 19.1297 24 17.4563 24 10.5938V5.67197H23.546C21.8458 5.67197 21.8733 7.72433 21.8437 9.31409Z"
                        fill="#F68F28"></path>
                    <path
                        d="M5.67191 23.2969V24H11.2969V18.061C11.2969 17.0766 10.7766 16.2047 10.0173 15.5157C8.9344 14.4328 7.21874 13.5751 5.91098 13.3219C5.46098 13.2376 4.54697 13.1251 4.37822 13.5469C4.27978 13.8 4.39228 14.3484 5.7704 15.5157C6.31883 15.8813 6.81102 16.1204 7.33133 16.3172C7.27513 16.4719 6.88133 17.5266 6.82508 17.6391C6.00941 17.3156 5.3204 16.9499 4.77192 16.5281C2.36729 14.7 2.18447 12.0704 2.1563 10.0313V9.31409C2.12668 7.72433 2.15424 5.67197 0.453997 5.67197H6.10352e-05V10.5938C6.10352e-05 17.4563 2.31099 19.1297 3.95634 20.3531C5.02499 21.1406 5.67191 21.6656 5.67191 23.2969Z"
                        fill="#F68F28"></path>
                </svg>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" class="shrink-0 size-8 text-gray-800 mt-0.5 me-6 dark:text-gray-200">
                    <g clip-path="url(#clip0)">
                        <path
                            d="M23.1176 0.678162H0.882338C0.395749 0.678162 -1.52588e-05 1.0744 -1.52588e-05 1.56051V16.1459C-1.52588e-05 16.6325 0.395749 17.0283 0.882338 17.0283H23.1176C23.6042 17.0283 24 16.6325 24 16.1459V1.56051C24 1.0744 23.6042 0.678162 23.1176 0.678162ZM20.3765 4.9224L20.3016 8.15016C20.2927 8.53416 19.9783 8.83957 19.5962 8.83957C19.5906 8.83957 19.5849 8.83957 19.5793 8.8391C19.1896 8.83016 18.8809 8.50687 18.8903 8.11722L18.9256 6.59157L15.9694 9.4104C15.7299 9.63863 15.3642 9.66969 15.0894 9.48569L12.0847 7.47157L8.87151 10.633C8.6662 10.8347 8.35664 10.8946 8.08657 10.7732L5.03528 9.39957V12.8532H19.6706C20.0602 12.8532 20.3765 13.1695 20.3765 13.5591C20.3765 13.9492 20.0602 14.265 19.6706 14.265H4.3294C3.93975 14.265 3.62351 13.9492 3.62351 13.5591V4.14734C3.62351 3.75769 3.93975 3.44146 4.3294 3.44146C4.71904 3.44146 5.03528 3.75769 5.03528 4.14734V7.85134L8.22587 9.28804L11.5049 6.06169C11.744 5.82687 12.1148 5.79204 12.3929 5.97887L15.4052 7.99769L17.9487 5.57228L16.4268 5.53699C16.0372 5.52804 15.7285 5.20475 15.7374 4.8151C15.7468 4.42546 16.0692 4.11769 16.4597 4.12569L19.687 4.20051C20.0317 4.20051 20.3765 4.4871 20.3765 4.9224Z"
                            fill="#F68F28"></path>
                        <path
                            d="M17.1353 21.9101H14.5802L14.2899 18.4402H9.71012L9.41977 21.9101H6.86471C6.47487 21.9101 6.15882 22.2261 6.15882 22.616C6.15882 23.0058 6.47487 23.3219 6.86471 23.3219H17.1353C17.5251 23.3219 17.8412 23.0058 17.8412 22.616C17.8412 22.2261 17.5251 21.9101 17.1353 21.9101Z"
                            fill="#F68F28"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="24" height="24" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>

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
