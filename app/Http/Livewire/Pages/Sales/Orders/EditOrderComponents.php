<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use Livewire\Component;

class EditOrderComponents extends Component
{
    public function render()
    {
        return view('livewire.pages.sales.orders.edit-order-components')->layout('layouts.admin');
    }
}
