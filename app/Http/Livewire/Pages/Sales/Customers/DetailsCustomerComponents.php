<?php

namespace App\Http\Livewire\Pages\Sales\Customers;

use App\Models\MasterData\City;
use App\Models\Sales\Customer;
use Livewire\Component;

class DetailsCustomerComponents extends Component
{
    public $getCustomer;
    
    public function mount($code)
    {
        $this->getCustomer = Customer::with('get_status', 'get_city', 'get_customer_order', 'get_address')->where('code', $code)->first();
    }

    public function render()
    {
        $customer   = $this->getCustomer;
        $customers  = Customer::where('id', $customer->id)->get();
        $city       = City::all();

        $data = [
            'customer'  => $customer,
            'customers'    => $customers,
            'cities'      => $city
        ];

        return view('livewire.pages.sales.customers.details-customer-components', $data)->layout('layouts.admin');
    }
}
