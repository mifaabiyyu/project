<?php

namespace App\Http\Livewire\Components\Modal\PurchaseRequest;

use App\Models\Division;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $division   = Division::all();

        $data   = [
            'divisions'  => $division
        ];

        return view('livewire.components.modal.purchase-request.edit', $data);
    }
}
