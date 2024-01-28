<?php

namespace App\Http\Livewire\Components\Modal\EngineProblem;

use App\Models\Machine;
use App\Models\Production\ProductionPlanning;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $productionPlanning     = ProductionPlanning::where('status', '!=', 5)->get();
        $dataMachine            = Machine::all();
        
        $data       = [
            'planning'      => $productionPlanning,
            'dataMachine'   => $dataMachine
        ];

        return view('livewire.components.modal.engine-problem.edit', $data);
    }
}
