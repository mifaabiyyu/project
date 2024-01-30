<?php

namespace App\Http\Livewire\Pages\Sales\Customers;

use App\Models\MasterData\BusinessType;
use App\Models\MasterData\City;
use App\Models\MasterData\Company;
use App\Models\Sales\Customer;
use Livewire\Component;

class EditCustomerComponents extends Component
{
    public $customer;

    public function mount($code)
    {
        $this->customer = Customer::where('code', $code)->first();    
    }

    public function render()
    {
        $cities     = City::all(); 
        $businessType = BusinessType::all();

        $data = [
            'cities'    => $cities,
            'customer'  => $this->customer,
            'businessType'  => $businessType
        ];

        return view('livewire.pages.sales.customers.edit-customer-components', $data)->layout('layouts.admin');
    }
}
