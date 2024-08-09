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
                    <form method="Post" action="{{ route('import.penghimpunan') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div class="messages">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="fields">
                            <div class="mb-3 input-group">
                                <input type="file" class="form-control" id="import_csv" name="import_csv"
                                    accept=".csv">
                                <label class="input-group-text" for="import_csv">Upload</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Import CSV</button>
                    </form>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
