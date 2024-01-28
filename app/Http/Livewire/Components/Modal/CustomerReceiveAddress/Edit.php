<?php

namespace App\Http\Livewire\Components\Modal\CustomerReceiveAddress;

use Livewire\Component;

class Edit extends Component
{
    public $cities;
    public $customers;
    
    public function render()
    {
        return view('livewire.components.modal.customer-receive-address.edit');
    }
}
