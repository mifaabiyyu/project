<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use App\Models\Quotation;
use App\Models\Sales\Customer;
use Livewire\Component;

class EditQuotationComponents extends Component
{
    public $data;

    public function mount($code)
    {
        $code = base64_decode($code);
        $this->data = Quotation::with('get_detail.get_product', 'get_status')->where('code', $code)->first();
        
    }

    public function render()
    {
        $customers  = Customer::all();

        $data = [
            'customers' => $customers
        ];
        return view('livewire.pages.sales.orders.edit-quotation-components', $data)->layout('layouts.admin');
    }
}
