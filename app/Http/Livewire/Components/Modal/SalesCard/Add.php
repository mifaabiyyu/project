<?php

namespace App\Http\Livewire\Components\Modal\SalesCard;

use Livewire\Component;

class Add extends Component
{   
    public $companies, $products;

    public function render()
    {
        return view('livewire.components.modal.sales-card.add');
    }
}
