<?php

namespace App\Http\Livewire\Pages\MasterData;

// use App\Models\MasterData\PackingType;
use Livewire\Component;

class ProductComponents extends Component
{
    public function render()
    {    
        return view('livewire.pages.master-data.product-components')->layout('layouts.admin');
    }
}
