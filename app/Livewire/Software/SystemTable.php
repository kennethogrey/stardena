<?php

namespace App\Livewire\Software;

use App\Models\System;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class SystemTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return System::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('image')
            ->add('inventory_name')
            ->add('demo_link')
            ->add('software_category')
            ->add('system_status', function (System $model) {
                $statusText = ($model->system_status == '1') ? 'Active' : 'Inactive';
                $statusColor = ($model->system_status == '1') ? 'btn-success' : 'btn-danger';
                $statusSvg = ($model->system_status == '1') ? 'thumb-up' : 'thumb-down';
                
                return '<span class="text-white btn ' . $statusColor . '" type="button">
                        <svg class="icon me-2">
                            <use xlink:href="panel/icons/sprites/free.svg#cil-'.$statusSvg.' "></use>
                        </svg>' . $statusText . '
                    </span>';
                })  
            ->add('updated_at')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Image', 'image')
                ->sortable()
                ->searchable(),

            Column::make('Inventory name', 'inventory_name')
                ->sortable()
                ->searchable(),
            Column::make('URL Link', 'demo_link')
                    ->sortable()
                    ->searchable(),

            Column::make('Software category', 'software_category')
                ->sortable()
                ->searchable(),

            Column::make('System status', 'system_status')
                ->sortable()
                ->searchable(),

            Column::make('Updated at', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }


    public function actions(System $row): array
    {
        return [
            Button::add('edit')
                ->slot('<svg class="icon icon-lg me-2"><use xlink:href="' . asset('panel/icons/sprites/free.svg#cil-pen') . '"></use></svg>')
                ->id()
                ->class('btn btn-ghost-primary')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('<svg class="icon icon-lg me-2"><use xlink:href="' . asset('panel/icons/sprites/free.svg#cil-delete') . '"></use></svg>')
                ->id()
                ->class('btn btn-ghost-danger')
                ->dispatch('delete', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
