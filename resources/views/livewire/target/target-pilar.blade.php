<x-card.app>
    <div class="justify-between w-full md:flex">
        <x-card.title>
            {{ __('Target Pilar') }}
        </x-card.title>
        <div class="flex flex-wrap gap-2">
            <x-button.link-primary href="">
                {{ __('Create') }}
            </x-button.link-primary>
        </div>
    </div>
    <div class="relative mt-6 overflow-x-visible overflow-y-visible rounded-md md:block">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('No.') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Pilar') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Nominal') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Tahun') }}
                    </th>
                    <th scope="col" class="px-6 py-3 lg:table-cell">
                        {{ __('Option') }}
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</x-card.app>
