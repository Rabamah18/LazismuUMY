<div class="space-y-4">
    {{-- Filter Tahunan --}}
    <div class="flex justify-end w-full flex-wrap gap-2">
        <div class="flex items-center gap-2">
            <x-select-input id="tahun" wire:model.lazy="selectedTahun" class="">
                <option value="">{{ __('Tahun') }}</option>
                @foreach ($tahuns as $tahun)
                    <option value="{{ $tahun->id }}">
                        {{ $tahun->name }}
                    </option>
                @endforeach
            </x-select-input>
        </div>
    </div>

    @livewire('target.target-tahunan')
    @livewire('target.target-sumber-donasi')
    @livewire('target.target-program-sumber')
    @livewire('target.target-pilar')
    @livewire('target.target-program-pilar')
</div>
