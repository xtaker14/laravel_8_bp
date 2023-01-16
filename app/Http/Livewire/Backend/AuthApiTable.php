<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\PersonalAccessToken as PAToken; 
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class AuthApiTable.
 */
class AuthApiTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return PAToken::when(
                $this->getFilter('search'), fn ($query, $term) => $query->search($term)
            );
            // ->when(
            //     $this->getFilter('type'), fn ($query, $term) => $query->where('type', $term)
            // )
            // ->when(
            //     $this->getFilter('is_menu'), fn ($query, $term) => $query->where('is_menu', $term)
            // )
            // ->when(
            //     $this->getFilter('is_module'), fn ($query, $term) => $query->where('is_module', $term)
            // );
    }
    
    // public function filters(): array
    // {
    //     return [
    //         'type' => Filter::make('Is Type')
    //             ->select([
    //                 '' => 'Any',
    //                 User::TYPE_ADMIN => 'Administrators',
    //                 User::TYPE_USER => 'Users',
    //             ]),
    //         'is_menu' => Filter::make('Is Menu')
    //             ->select([
    //                 '' => 'Any',
    //                 'yes' => 'Yes',
    //                 'no' => 'No',
    //             ]),
    //         'is_module' => Filter::make('Is Module')
    //             ->select([
    //                 '' => 'Any',
    //                 'yes' => 'Yes',
    //                 'no' => 'No',
    //             ]),
    //     ];
    // }

    public function columns(): array
    {
        return [
            Column::make(__('Token ID'))
                ->sortable(),
            Column::make(__('Token Name'))
                ->sortable(),
            Column::make(__('Token Code')), 
            Column::make(__('Abilities')),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.auth.api.includes.row';
    }
}
