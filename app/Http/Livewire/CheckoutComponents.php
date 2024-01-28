<?php

namespace App\Http\Livewire;

use App\Models\Quotation;
use Livewire\Component;

class CheckoutComponents extends Component
{
    public $data = '';

    public function mount($code)
    {
        $code = base64_decode($code);

        $findData = Quotation::where('code', $code)->first();

        if (!$findData) {
            abort(404);
        }

        $this->data = $findData;
    }

    public function render()
    {
        return view('livewire.checkout-components');
    }
}
