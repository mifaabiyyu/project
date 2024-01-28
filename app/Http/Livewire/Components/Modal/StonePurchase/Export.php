<?php

namespace App\Http\Livewire\Components\Modal\StonePurchase;

use Livewire\Component;

class Export extends Component
{
    public $suppliers;
    public $stones;

    public function render()
    {
        return view('livewire.components.modal.stone-purchase.export');
    }
}
