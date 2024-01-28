<?php

namespace App\Http\Livewire\Pages\Sales\Customers;

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
        $companies  = Company::where('status', 1)->get();
        $cities     = City::all(); 

        $data = [
            'companies' => $companies,
            'cities'    => $cities,
            'customer'  => $this->customer
        ];

        return view('livewire.pages.sales.customers.edit-customer-components', $data)->layout('layouts.admin');
    }
}
