<div class="relative mt-6 overflow-x-visible overflow-y-visible rounded-md md:block">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('No.') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Program') }}
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
            @forelse ($targetProgramPilars as $targetProgramPilar)
                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        {{-- loop --}}
                        <div class="flex">
                            <div class="hover:underline whitespace-nowrap">
                                {{-- {{ ($targetProgramPilars->currentpage() - 1) * $targetProgramPilars->perpage() + $loop->index + 1 }} --}}
                                {{ $targetProgramPilar->id }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $targetProgramPilar->programPilar->name ?? '-' }}
                            </p>
                        </div>
                    </td>

                    <td wire:key="nominal-{{ $targetProgramPilar->id }}" x-data="{
                        nominal: {{ $targetProgramPilar->nominal }},
                    }"
                        class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p x-text="'Rp. ' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')"></p>
                        </div>
                    </td>

                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            {{ $targetProgramPilar->tahun->name ?? '-' }}
                        </div>
                    </td>

                    <td class="py-4 pl-6 pr-2 lg:pr-4">
                        <div class="flex space-x-2 justify-items-start">
                            <a href="{{ route('targetprogrampilar.edit', ['targetprogrampilar' => $targetProgramPilar]) }}"
                                class="text-indigo-500 hover:underline">Ubah</a>
                            <button x-data="" class="text-red-500 hover:underline"
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $targetProgramPilar->id }}')">
                                Hapus
                            </button>

                            <x-modal name="confirm-user-deletion{{ $targetProgramPilar->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                focusable>
                                <form method="post"
                                    action="{{ route('targetprogrampilar.destroy', $targetProgramPilar) }}"
                                    class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $targetProgramPilar->ProgramPilar->name ?? '-' }}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $targetProgramPilar->tahun->name ?? '-' }}
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
