<?php

namespace App\Http\Livewire\Components\Modal\Mechanical\Rpm;

use App\Models\Machine;
use App\Models\Production\ProductionPlanning;
use Livewire\Component;

class Add extends Component
{
    public function render()
    {
        $productionPlanning     = ProductionPlanning::where('status', '!=', 5)->get();
        $machine                =  Machine::all();


        $data       = [
            'planning'      => $productionPlanning,
            'machines'      => $machine
        ];

        return view('livewire.components.modal.mechanical.rpm.add', $data);
    }
}
