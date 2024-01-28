<?php

namespace App\Http\Livewire\Pages\Sales\Customers;

use App\Models\MasterData\City;
// use App\Models\MasterData\Company;
use Livewire\Component;

class AddCustomerComponents extends Component
{
    public function render()
    {
        // $companies  = Company::where('status', 1)->get();
        $cities     = City::all(); 

        $data = [
            'cities'    => $cities
        ];

        return view('livewire.pages.sales.customers.add-customer-components', $data)->layout('layouts.admin');
    }
}
