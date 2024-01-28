<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use Livewire\Component;

class OrderComponents extends Component
{
    public function render()
    {
        return view('livewire.pages.sales.orders.order-components')->layout('layouts.admin');
    }
}
