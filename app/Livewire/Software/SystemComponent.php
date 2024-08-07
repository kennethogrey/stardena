<?php

namespace App\Livewire\Software;

use Livewire\Component;
use App\Livewire\Home\SessionComponent;
use App\Models\System;

class SystemComponent extends Component
{
    use SessionComponent;
    public $create_system = false, $edit_system = false, $delete_system = false, $image, $inventory_name, $demo_link, $software_category, 
        $system_status, $system_id;

    public function openCreateSystemModal():void 
    {
        $this->edit_system = false;
        $this->create_system = true;
    }

    
    public function storeSystem(): void 
    {
        $validatedData = $this->validate([
            'image' => ['required', 'string', 'max:255'],
            'inventory_name' => ['required', 'string', 'max:255'],
            'software_category' => ['required', 'string', 'max:25'],
            'demo_link' => ['required', 'string', 'max:255'],
            'system_status' => ['required', 'string', 'max:2'],
        ]);

        if(empty($this->system_id)) {
            if (System::create($validatedData)) {
                session()->flash('success', 'System Created Successfully');
                $this->create_system = false;
            } else {
                session()->flash('danger', 'An Error Occurred');
            }
        } else {
            if(System::find($this->system_id)->update($validatedData)) {
                session()->flash('success', 'System Updated Successfully');
                $this->edit_system = false;
            }else {
                session()->flash('danger', 'An Error Occurred');
            }
        }
        $this->reset();
        $this->dispatch('$refresh');
    }

    
    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $system = System::find($rowId);
        $this->system_id = $system->id;
        $this->image = $system->image;
        $this->inventory_name = $system->inventory_name;
        $this->demo_link = $system->demo_link;
        $this->software_category = $system->software_category;
        $this->system_status = $system->system_status;

        $this->edit_system = true;
        // $this->js('alert('.$rowId.')');
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        $system = System::find($rowId);
        $this->inventory_name = $system->inventory_name;
        $this->system_id = $system->id;

        $this->delete_system = true;
        $this->js('deleteSystem()');
    }

    public function deleteSystemNow($system_id): void
    {
        if (System::find($system_id)->delete()) {
            $this->js('refreshPage()');
            session()->flash('success', 'System Deleted Successfully');
        } else {
            session()->flash('danger', 'An Error Occurred');
        }
        $this->dispatch('$refresh');
    }

    function openSysytemTable(): void
    {
        $this->create_system = false;
        $this->edit_system = false;
        $delete_system = false;
    }

    public function render()
    {
        return view('livewire.software.system-component');
    }
}
