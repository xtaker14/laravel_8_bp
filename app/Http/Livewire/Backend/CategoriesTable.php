<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Permission as Categories;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class CategoriesTable.
 */
class CategoriesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Categories::when(
                $this->getFilter('search'), fn ($query, $term) => $query->search($term)
            )->when(
                $this->getFilter('type'), fn ($query, $term) => $query->where('type', $term)
            )->when(
                $this->getFilter('is_menu'), fn ($query, $term) => $query->where('is_menu', $term)
            )->when(
                $this->getFilter('is_module'), fn ($query, $term) => $query->where('is_module', $term)
            );
    }
    
    public function filters(): array
    {
        return [
            'type' => Filter::make('Is Type')
                ->select([
                    '' => 'Any',
                    User::TYPE_ADMIN => 'Administrators',
                    User::TYPE_USER => 'Users',
                ]),
            'is_menu' => Filter::make('Is Menu')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
            'is_module' => Filter::make('Is Module')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('Type'))
                ->sortable(),
            Column::make(__('Category Name')),
            Column::make(__('Is Menu'))
                ->sortable(),
            Column::make(__('URL')),
            Column::make(__('Method Name')),
            Column::make(__('Access Name'))
                ->sortable(),
            Column::make(__('Parent'))
                ->sortable(),
            Column::make(__('Order'))
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.auth.categories.includes.row';
    }
}
