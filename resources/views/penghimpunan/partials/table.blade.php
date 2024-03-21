<div class="relative mt-6 overflow-x-visible overflow-y-visible rounded-md md:block">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('No') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Uraian') }}
                </th>
                <th scope="col" class="px-6 py-3 xl:table-cell">
                    {{ __('Tanggal') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Nominal') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Sumber Dana') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Program Sumber') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Tahun') }}
                </th>
                <th scope="col" class="py-3 pl-6 pr-2 lg:pr-4">
                    {{ __('Option') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penghimpunans as $penghimpunan)
                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        {{-- loop --}}
                        <div class="flex">
                            <div class="hover:underline whitespace-nowrap">
                                {{ ($penghimpunans->currentpage() - 1) * $penghimpunans->perpage() + $loop->index + 1 }}
                            </div>

                        </div>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        {{-- loop --}}
                        <div class="flex">
                            <a href="{{ route('penghimpunan.create', $penghimpunan) }}"
                                class="hover:underline whitespace-nowrap">
                                {{ $penghimpunan->uraian }}
                            </a>

                        </div>
                    </td>
                    <td scope="row" class="px-6 py-4 text-gray-500 font-base dark:text-gray-400 xl:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->tanggal->format('d F Y') }}
                            </p>

                        </div>

                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->nominal }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->sumberDana->name }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->programSumber->name }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->tahun->name }}
                            </p>

                        </div>
                    </td>
                    <td class="py-4 pl-6 pr-2 lg:pr-4">
                        <div class="flex justify-items-start">
                            {{-- <a href="{{ route('admin.users.edit', $penghimpunan) }}"
                            class="hover:underline">Edit</a> --}}
                            @include('penghimpunan.partials.action')
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        Empty
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
