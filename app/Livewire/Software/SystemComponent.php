<?php

namespace App\Livewire\Software;

use Livewire\Component;
use App\Livewire\Home\SessionComponent;
use App\Models\System;

class SystemComponent extends Component
{
    use SessionComponent;
    public $create_system = false, $image, $inventory_name, $software_category, $system_status;

    public function openCreateSystemModal():void 
    {
        $this->create_system = true;
    }

    
    public function storeSystem(): void 
    {
        $validatedData = $this->validate([
            'image' => ['required', 'string', 'max:255'],
            'inventory_name' => ['required', 'string', 'max:25'],
            'software_category' => ['required', 'string', 'max:25'],
            'system_status' => ['required', 'string', 'max:2'],
        ]);

        // Assuming System is the model name
        if (System::create($validatedData)) {
            session()->flash('success', 'System Created Successfully');
        } else {
            session()->flash('danger', 'An Error Occurred');
        }
        $this->dispatch('$refresh');
        $this->create_system = false;
        
    }


    public function render()
    {
        return view('livewire.software.system-component');
    }
}
