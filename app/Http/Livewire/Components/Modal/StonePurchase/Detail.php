<?php

namespace App\Http\Livewire\Components\Modal\StonePurchase;

use App\Models\RawMaterial\Stone;
use App\Models\RawMaterial\StoneSupplier;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        $supplier   = StoneSupplier::all();
        $stone      = Stone::all();

        $data       = [
            'suppliers' => $supplier,
            'stones'    => $stone
        ];

        return view('livewire.components.modal.stone-purchase.detail', $data);
    }
}
