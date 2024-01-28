<?php

namespace App\Http\Livewire\Components\Modal\Vehicle;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $type_vehicles  = [ 'Engkel', 'Colt Diesel', 'Fuso', 'Tronton', 'Trailer', 'Kontainer' ];

        $data   = [
            'type_vehicles'     => $type_vehicles
        ];

        return view('livewire.components.modal.vehicle.edit', $data);
    }
}
