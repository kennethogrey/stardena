<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Partner;
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

final class PartnersTable extends PowerGridComponent
{
    use WithExport;
    public $partner;

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
        return Partner::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('company_name')
            ->add('company_logo')
            ->add('company_location')
            ->add('project_owner')
            ->add('owner_contact')
            ->add('project_title')
            ->add('project_description', function($partner) {
                return '<span class="btn btn-ghost-primary" type="button" wire:click="viewDescription('.$partner->id.')">
                            <svg class="icon me-2">
                                <use xlink:href="panel/icons/sprites/free.svg#cil-screen-desktop"></use>
                            </svg>View
                        </span>';
            })
            ->add('project_bill')
            ->add('amount_paid')
            ->add('currency')
            ->add('agreement_documents')
            ->add('domain_name')
            ->add('project_manager', function($partner) {
                $partner->with('projectManager')->get();
                return $partner->projectManager->name;
            })
            ->add('date_paid')
            ->add('developers', function ($partner) {
                $developerIdsString = str_replace(['[', ']', '"'], '', $partner->developers);
                $developerIds = array_map('trim', explode(',', $developerIdsString));
                $developerNames = User::whereIn('id', $developerIds)->pluck('name')->toArray();
                return implode(', ', $developerNames);
            })            
            ->add('txn_status', function ($partner) {
                $statusText = ($partner->txn_status == 'completed') ? 'Completed' : (($partner->txn_status == 'incomplete') ? 'Incomplete' : 'Unpaid');
                $statusColor = ($partner->txn_status == 'completed') ? 'btn-success' : (($partner->txn_status == 'incomplete') ? 'btn-warning' : 'btn-danger');
                $statusSvg = ($partner->txn_status == 'completed') ? 'wifi-signal-4' : (($partner->txn_status == 'incomplete') ? 'wifi-signal-2' : 'wifi-signal-off');
        
                return '<span class="text-white btn ' . $statusColor . '" type="button">
                        <svg class="icon me-2">
                            <use xlink:href="panel/icons/sprites/free.svg#cil-'.$statusSvg.' "></use>
                        </svg>' . $statusText . '
                    </span>';
                })  
            ->add('progress_status', function ($partner) {
                $statusText = ($partner->progress_status == 'completed') ? 'Completed' : (($partner->progress_status == 'progress') ? 'Progressing' : 'Pending');
                $statusColor = ($partner->progress_status == 'completed') ? 'btn-success' : (($partner->progress_status == 'progress') ? 'btn-warning' : 'btn-danger');
                $statusSvg = ($partner->progress_status == 'completed') ? 'wifi-signal-4' : (($partner->progress_status == 'progress') ? 'wifi-signal-2' : 'wifi-signal-off');
        
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
            Column::make('Company name', 'company_name')
                ->sortable()
                ->searchable(),

            Column::make('Company logo', 'company_logo')
                ->sortable()
                ->searchable(),

            Column::make('Company location', 'company_location')
                ->sortable()
                ->searchable(),

            Column::make('Project owner', 'project_owner')
                ->sortable()
                ->searchable(),

            Column::make('Owner contact', 'owner_contact')
                ->sortable()
                ->searchable(),

            Column::make('Project title', 'project_title')
                ->sortable()
                ->searchable(),

            Column::make('Project description', 'project_description')
                ->sortable()
                ->searchable(),

            Column::make('Project bill', 'project_bill')
                ->sortable()
                ->searchable(),

            Column::make('Amount paid', 'amount_paid')
                ->sortable()
                ->searchable(),

            Column::make('Currency', 'currency')
                ->sortable()
                ->searchable(),

            Column::make('Agreement documents', 'agreement_documents')
                ->sortable()
                ->searchable(),

            Column::make('Domain name', 'domain_name')
                ->sortable()
                ->searchable(),

            Column::make('Project manager', 'project_manager')
                ->sortable()
                ->searchable(),

            Column::make('Date paid', 'date_paid')
                ->sortable()
                ->searchable(),

            Column::make('Developers', 'developers')
                ->sortable()
                ->searchable(),

            Column::make('Transaction status', 'txn_status')
                ->sortable()
                ->searchable(),

            Column::make('Progress status', 'progress_status')
                ->sortable()
                ->searchable(),

            Column::make('Updated at', 'updated_at')
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

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Partner $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
