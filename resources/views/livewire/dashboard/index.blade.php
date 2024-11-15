<div class="space-y-6">
    <div class="flex items-center justify-end w-full gap-2">
        <x-input-label for="tahun" :value="__('Tahun')" />
        <x-select-input id="tahun" wire:model.lazy="selectedTahun" class="">
            <option value="">{{ __('Tahun') }}</option>
            @foreach ($tahuns as $tahun)
                <option value="{{ $tahun->id }}">
                    {{ $tahun->name }}
                </option>
            @endforeach
        </x-select-input>
    </div>

    @livewire('dashboard.table-saldo')

    @livewire('dashboard.table-fundraising')

    @livewire('dashboard.table-tasyaruf')

</div>