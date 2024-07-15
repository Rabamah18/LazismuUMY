<div class="relative mt-6 overflow-auto rounded-md">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('No.') }}
                </th>
                <th scope="col" class="px-6 py-3 xl:table-cell">
                    {{ __('Tanggal') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Uraian') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Nominal') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Lembaga') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Pria') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Wanita') }}
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
                    <td scope="row" class="px-6 py-4 text-gray-500 font-base dark:text-gray-400 xl:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->tanggal->isoFormat('LL') }}
                            </p>
                        </div>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        {{-- loop --}}
                        <div class="flex">
                            <a href="{{ route('penghimpunan.show', $penghimpunan) }}"
                                class="hover:underline whitespace-nowrap">
                                {{ Str::limit($penghimpunan->uraian, 10, '...') }}
                            </a>

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
                                {{ $penghimpunan->lembaga_count ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->male_count ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->female_count ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->sumberDana->name ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->programSumber->name ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penghimpunan->tahun->name ?? '-' }}
                            </p>

                        </div>
                    </td>
                    <td class="py-4 pl-6 pr-2 lg:pr-4">
                        <div class="flex space-x-2 justify-items-start">
                            <a href="{{ route('penghimpunan.show', $penghimpunan) }}" class="hover:underline">View</a>
                            <a href="{{ route('penghimpunan.edit', $penghimpunan) }}"
                                class="text-indigo-500 hover:underline">Edit</a>
                            <button x-data="" class="text-red-500 hover:underline"
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $penghimpunan->id }}')">
                                Hapus
                            </button>

                            <x-modal name="confirm-user-deletion{{ $penghimpunan->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('penghimpunan.destroy', $penghimpunan) }}"
                                    class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $penghimpunan->uraian }}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $penghimpunan->tanggal->format('d F Y') }}
                                    </p>

                                    <div class="flex justify-end mt-6">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Batal') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Hapus') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
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
