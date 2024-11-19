<div class="space-y-6">
    <div class="flex items-center justify-end w-full gap-2">
        <x-input-label for="tahun" :value="__('Tahun')" />
        <x-select-input id="tahun" wire:model.change="selectedTahun" class="">
            <option value="">{{ __('Tahun') }}</option>
            @foreach ($tahuns as $tahun)
                <option value="{{ $tahun->id }}">
                    {{ $tahun->name }}
                </option>
            @endforeach
        </x-select-input>
    </div>

    <livewire:dashboard.table-saldo :selectedTahun="$selectedTahun" :key="'Saldo' . $selectedTahun" />

    <livewire:dashboard.table-fundraising :selectedTahun="$selectedTahun" :key="'Fundraising' . $selectedTahun" />

    <livewire:dashboard.table-tasyaruf :selectedTahun="$selectedTahun" :key="'Tasyaruf' . $selectedTahun" />

</div>
