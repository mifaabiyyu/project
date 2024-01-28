<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use Livewire\Component;

class AddQuotationComponents extends Component
{
    public function render()
    {
        return view('livewire.pages.sales.orders.add-quotation-components')->layout('layouts.admin');
    }
}
