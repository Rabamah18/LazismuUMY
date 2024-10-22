<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-auto h-20 text-gray-800 fill-current dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 md:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dasbor') }}
                    </x-nav-link>
                    <x-nav-link :href="route('penghimpunan.index')" :active="request()->routeIs('penghimpunan.*')">
                        {{ __('Penghimpunan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('penyaluran.index')" :active="request()->routeIs('penyaluran.*')">
                        {{ __('Penyaluran') }}
                    </x-nav-link>
                    <div class="items-center hidden border-t-2 border-transparent sm:flex">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                    <div>{{ __('Setting') }}</div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('pilar.index')">
                                    {{ __('Pilar') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('programpilar.index')">
                                    {{ __('Program Pilar') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('sumberdana.index')">
                                    {{ __('Sumber Dana') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('programsumber.index')">
                                    {{ __('Program Sumber') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('ashnaf.index')">
                                    {{ __('Ashnaf') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('lokasi.index')">
                                    {{ __('Lokasi') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('provinsi.index')">
                                    {{ __('Provinsi') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('kabupaten.index')">
                                    {{ __('Kabupaten') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('tahun.index')">
                                    {{ __('Tahun') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    {{-- <div class="items-center hidden border-t-2 border-transparent sm:flex">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                    <div>{{ __('Master Data') }}</div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                            </x-slot>
                        </x-dropdown>
                    </div> --}}
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden border-t-2 border-transparent md:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('home')">
                            {{ __('Beranda') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dasbor') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('penghimpunan.index')" :active="request()->routeIs('penghimpunan.*')">
                {{ __('Penghimpunan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('penyaluran.index')" :active="request()->routeIs('penyaluran.*')">
                {{ __('Penyaluran') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pilar.index')" :active="request()->routeIs('pilar.*')">
                {{ __('Pilar') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('programpilar.index')" :active="request()->routeIs('programpilar.*')">
                {{ __('Program Pilar') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sumberdana.index')" :active="request()->routeIs('sumberdana.*')">
                {{ __('Sumber Dana') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('programsumber.index')" :active="request()->routeIs('programsumber.*')">
                {{ __('Program Sumber') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('ashnaf.index')" :active="request()->routeIs('ashnaf.*')">
                {{ __('Ashnaf') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lokasi.index')" :active="request()->routeIs('lokasi.*')">
                {{ __('Lokasi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('provinsi.index')" :active="request()->routeIs('provinsi.*')">
                {{ __('Provinsi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kabupaten.index')" :active="request()->routeIs('kabupaten.*')">
                {{ __('Kabupaten') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tahun.index')" :active="request()->routeIs('tahun.*')">
                {{ __('Tahun') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 sm:px-6">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('home')">
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Kelar') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
