<?php

namespace App\Http\Livewire\Components\Modal\StoneSupplier;

use App\Models\RawMaterial\Stone;
use Livewire\Component;

class Add extends Component
{
    public $stones = [];
    public $material = [];

    
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->stones = Stone::all();

        $this->material[]   = [];
    }

    public function render()
    {
        return view('livewire.components.modal.stone-supplier.add');
    }

    public function addProduct()
    {
        $this->material[]   = [];

    }

    public function deleteRow($index)
    {
        unset($this->material[$index]);
        array_values($this->material);

    }


}
