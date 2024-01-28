<?php

namespace App\Http\Livewire\Components\Modal\StoneUsage;

use App\Models\Production\ProductionPlanning;
use App\Models\RawMaterial\Stone;
use Livewire\Component;

class Detail extends Component
{
    public $stones = [];
    public $materialEdit = [];
    public $deleted = [];
    public $production_planning = [];
   
    protected $listeners = [
        'setValueData'
    ];


    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->stones = Stone::all();
        $this->production_planning = ProductionPlanning::where('status', 3)->get();
    }

    public function render()
    {
        return view('livewire.components.modal.stone-usage.detail');
    }

    public function setValueData($detail)
    {
        $this->materialEdit = [];
        $this->deleted      = [];
        $this->stone_id     = [];

        // dd($detail);
        foreach ($detail as $key => $value) {
            $this->materialEdit[]   = [
                'id'        => $value['id'],
                'qty'       => $value['qty'],
                'stone_id'  => $value['stone_id'],
                'unit'      => $value['unit'],
                'status'    => 'old'
            ];

            $this->stone_id[]   = $value['stone_id'];
        }

        // dd($this->material);
    }
}
