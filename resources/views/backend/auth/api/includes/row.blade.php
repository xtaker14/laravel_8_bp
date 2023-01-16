<x-livewire-tables::bs4.table.cell>
    {{ $row->tokenable_id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->token_non_hash }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{-- {{ count($row->abilities) > 1 ? '- ' . implode("</br> - ", $row->abilities) : implode("", $row->abilities) }} --}}
    {{ implode(", ", $row->abilities) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.auth.api.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
