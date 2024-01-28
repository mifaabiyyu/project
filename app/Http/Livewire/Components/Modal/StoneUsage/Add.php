<?php

namespace App\Http\Livewire\Components\Modal\StoneUsage;

use App\Models\Production\ProductionPlanning;
use App\Models\RawMaterial\Stone;
use Livewire\Component;

class Add extends Component
{
    public $stones = [];
    public $material = [];
    public $production_planning = [];
        
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->stones = Stone::all();
        $this->production_planning = ProductionPlanning::where('status', 3)->get();

        $this->material[]   = [];
    }

    public function render()
    {
        return view('livewire.components.modal.stone-usage.add');
    }

    
    public function addStone()
    {
        $this->material[]   = [];

    }

    public function deleteRow($index)
    {
        unset($this->material[$index]);
        array_values($this->material);

    }
}
