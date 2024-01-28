<?php

namespace App\Http\Livewire\Components\Modal\StonePurchase;

use App\Models\RawMaterial\Stone;
use App\Models\RawMaterial\StoneSupplier;
use App\Models\RawMaterial\StoneSupplierDetail;
use Livewire\Component;

class Add extends Component
{
    public $stones      = [];
    public $suppliers   = []; 

    protected $listeners = [
        'changeSupplier', 'updateSupplier'
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        $this->suppliers   = StoneSupplier::all();

        return view('livewire.components.modal.stone-purchase.add');
    }

    public function changeSupplier($id)
    {
        $findData   = StoneSupplierDetail::with('get_stone')->where('stone_supplier_id', $id)->get();

        $this->stones = $findData;
    }

    public function updateSupplier($id)
    {
        $this->suppliers   = StoneSupplier::all();
    }
}
