<x-card.app>
    <div>
        <x-button.link-primary href="{{ route('targetpilar.create') }}">
            {{ __('Create') }}
        </x-button.link-primary>
    </div>

    <div>
        <table>
            <thead>
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
                </tr>
            </thead>
        </table>
    </div>
</x-card.app>
