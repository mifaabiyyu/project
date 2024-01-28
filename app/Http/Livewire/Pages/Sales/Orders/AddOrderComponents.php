<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use Livewire\Component;

class AddOrderComponents extends Component
{
    public function render()
    {
        return view('livewire.pages.sales.orders.add-order-components')->layout('layouts.admin');
    }
}
