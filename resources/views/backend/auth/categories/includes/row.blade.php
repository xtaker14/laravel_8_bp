
<x-livewire-tables::bs4.table.cell>
    @if ($row->type === \App\Domains\Auth\Models\User::TYPE_ADMIN)
        {{ __('Administrator') }}
    @elseif ($row->type === \App\Domains\Auth\Models\User::TYPE_USER)
        {{ __('User') }}
    @else
        N/A
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ strtoupper($row->is_menu) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if($row->is_menu == 'yes')
        {{ $row->menu_url }}
    @else
        -
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if($row->is_editable == 'yes')
        @if($row->is_module == 'yes')
            <b>Module Name : </b>
            {{ $row->module_name }}
            <br>
        @endif
        <b>Controller Name : </b>
        {{ $row->controller_name }}
        <br>
        <b>Method Name : </b>
        {{ $row->method_name }}
    @else
        -
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->parent_id))
        {{ $row->parent()->first()->description ?? '' }}
    @else
        -
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->sort }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.auth.categories.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
