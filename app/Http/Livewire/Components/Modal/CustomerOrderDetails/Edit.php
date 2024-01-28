<?php

namespace App\Http\Livewire\Components\Modal\CustomerOrderDetails;

use Livewire\Component;

class Edit extends Component
{
    public $products , $spesification;
    public function render()
    {
        return view('livewire.components.modal.customer-order-details.edit');
    }
}
