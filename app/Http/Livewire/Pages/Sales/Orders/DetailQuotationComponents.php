<?php

namespace App\Http\Livewire\Pages\Sales\Orders;

use App\Models\Quotation;
use Livewire\Component;

class DetailQuotationComponents extends Component
{
    public $data;

    public function mount($code)
    {
        $code = base64_decode($code);
        $this->data = Quotation::with('get_detail', 'get_status')->where('code', $code)->first();
        
    }

    public function render()
    {
        return view('livewire.pages.sales.orders.detail-quotation-components')->layout('layouts.admin');
    }
}
