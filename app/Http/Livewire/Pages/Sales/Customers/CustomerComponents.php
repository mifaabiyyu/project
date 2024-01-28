<?php

namespace App\Http\Livewire\Pages\Sales\Customers;

// use App\Models\MasterData\Company;
use Livewire\Component;

class CustomerComponents extends Component
{
    public function render()
    {
       
        return view('livewire.pages.sales.customers.customer-components')->layout('layouts.admin');
    }
}
