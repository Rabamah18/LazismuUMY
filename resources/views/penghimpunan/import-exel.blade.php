<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Import Data Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Import Data Penghimpunan') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Penghimpunan.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('penghimpunan.import') }}" class="mt-6 space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="relative flex flex-col w-full max-w-sm gap-1 text-gray-600 dark:text-gray-300">
                            <label for="fileInput" class="w-fit pl-0.5 text-sm">Upload File</label>
                            <input id="fileInput" type="file" name="doc"
                                class="w-full max-w-md text-sm border border-gray-300 rounded-md overflow-clip bg-gray-50/50 file:mr-4 file:cursor-pointer file:border-none file:bg-gray-50 file:px-4 file:py-2 file:font-medium file:text-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-gray-700 dark:bg-gray-900/50 dark:file:bg-gray-900 dark:file:text-white dark:focus-visible:outline-white" />
                            <small class="pl-0.5">CSV, xlx, xlxs - Max 2MB</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Import') }}</x-primary-button>

                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Imported.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
