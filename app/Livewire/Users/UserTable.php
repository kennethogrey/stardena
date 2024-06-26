<?php

namespace App\Livewire\Users;

use App\Models\User;
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

final class UserTable extends PowerGridComponent
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
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('phone')
            ->add('role')
            ->add('profile_photo', function (User $model) {
                $profilePhotoUrl = 'storage/profile-photos/' . $model->profile_photo;
            
                return '<img src="' . asset($profilePhotoUrl) . '" alt="Photo" class="rounded" style="width:auto; height:80px;border-radius:50%;">';
                })
            ->add('staff')
            ->add('status', function (User $model) {
                $statusText = ($model->status == '1') ? 'Active' : 'Inactive';
                $statusColor = ($model->status == '1') ? 'btn-success' : 'btn-danger';
                $statusSvg = ($model->status == '1') ? 'thumb-up' : 'thumb-down';

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
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),

            Column::make('Role', 'role')
                ->sortable()
                ->searchable(),

            Column::make('Profile photo', 'profile_photo')
                ->sortable()
                ->searchable(),

            Column::make('Staff', 'staff')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
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


    public function actions(User $user): array
    {
        return [
            Button::add('editUser')
            ->slot('<svg class="icon icon-lg me-2"><use xlink:href="' . asset('panel/icons/sprites/free.svg#cil-pen') . '"></use></svg>')
            ->id()
            ->class('btn btn-ghost-primary')
            ->dispatch('editUser', ['userId' => $user->id]),
            Button::add('deleteUser')
            ->slot('<svg class="icon icon-lg me-2"><use xlink:href="' . asset('panel/icons/sprites/free.svg#cil-delete') . '"></use></svg>')
            ->id()
            ->class('btn btn-ghost-danger')
            ->dispatch('deleteUser', ['userId' => $user->id])
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
