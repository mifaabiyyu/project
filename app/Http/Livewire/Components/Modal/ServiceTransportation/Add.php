<?php

namespace App\Http\Livewire\Components\Modal\ServiceTransportation;

use App\Models\MasterData\Vehicle;
use Livewire\Component;

class Add extends Component
{
    public function render()
    {
        $vehicles   = Vehicle::all();

        $data   = [
            'vehicles'  => $vehicles
        ];

        return view('livewire.components.modal.service-transportation.add', $data);
    }
}
