<?php

namespace App\Livewire\Home;

use App\Models\Newsletter;
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

final class EmailTable extends PowerGridComponent
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
        return Newsletter::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('email')
            ->add('status', function (Newsletter $model) {
                $statusText = ($model->status == '1') ? 'Subscribed' : 'Unsubscribed';
                $statusColor = ($model->status == '1') ? 'btn-success' : 'btn-danger';
                $statusSvg = ($model->status == '1') ? 'thumb-up' : 'thumb-down';

                return '<span class="text-white btn ' . $statusColor . '" type="button">
                        <svg class="icon me-2">
                            <use xlink:href="panel/icons/sprites/free.svg#cil-'.$statusSvg.' "></use>
                        </svg>' . $statusText . '
                    </span>';
                })  
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

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

    #[\Livewire\Attributes\On('deleteEmail')]
    public function deleteEmail($email_id): void
    {
        $this->js('deleteEmail('.$email_id.')');
    }

    public function actions(Newsletter $row): array
    {
        return [
            Button::add('deleteEmail')
                ->slot('<svg class="icon icon-lg me-2"><use xlink:href="' . asset('panel/icons/sprites/free.svg#cil-delete') . '"></use></svg>')
                ->id()
                ->class('btn btn-ghost-danger')
                ->dispatch('deleteEmail', ['email_id' => $row->id])
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
