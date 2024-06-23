<?php

namespace App\Livewire\Home;

use Livewire\Component;

trait SessionComponent
{
    public function removeAlert()
    {
        session()->forget('success');
    }

    public function render()
    {
        return view('livewire.home.session-component');
    }
}
