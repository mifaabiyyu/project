<?php

namespace App\Http\Livewire\Components\Modal\User;

use App\Models\Role;
use App\Models\Sales\Customer;
use Livewire\Component;

class Add extends Component
{
    public $roles;

    public function render()
    {
        $customers  = Customer::all();

        $data = [
            'customers' => $customers
        ];

        return view('livewire.components.modal.user.add', $data);
    }
}
