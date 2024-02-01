<?php

namespace App\Http\Livewire;

use App\Models\Quotation;
use Livewire\Component;
use App\Http\Services\Checkout\CheckoutService as Service;

class CheckoutComponents extends Component
{
    public $data = '';
    public $xenditUrl = '';

    public function mount($code)
    {
        $code = base64_decode($code);

        $findData = Quotation::where('code', $code)->first();

        if (!$findData) {
            abort(404);
        }
        $service = new Service();
        $this->data = $findData;

        $xenditData = [
            "currency" => "IDR",
            'code'      => $this->data->code,
            "amount" => $this->data->total,
            // "redirect_url" => route('success')
        ];

        $this->xenditUrl = $service->createInvoice($xenditData);
    }

    public function render()
    {
        return view('livewire.checkout-components');
    }
}
