<?php

namespace App\Http\Livewire\Components\Modal\StoneUsage;

use App\Models\Production\ProductionPlanning;
use App\Models\RawMaterial\Stone;
use Livewire\Component;

class Edit extends Component
{
    public $stones = [];
    // public $stone_id = [];
    public $materialEdit = [];
    public $deleted = [];
    public $production_planning = [];
    public $unit = [];
    
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
        return view('livewire.components.modal.stone-usage.edit');
    }

        
    public function addStone()
    {
        $this->materialEdit[]   = [
            'id'        => 0,
            'stone_id'  => '',
            'qty'       => '',
            'unit'       => '',
            'status'    => 'new'
        ];
        $this->stone_id[]   = '';
        $this->unit[]   = '';
    }

    public function deleteRow($index)
    {
        if ($this->materialEdit[$index]['id'] != 0) {
            $this->deleted[]    = $this->materialEdit[$index]['id'];
        }
        unset($this->stone_id[$index]);
        array_values($this->stone_id);

        unset($this->materialEdit[$index]);
        array_values($this->materialEdit);
    }

    
    public function setValueData($detail)
    {
        $this->materialEdit = [];
        $this->deleted      = [];
        $this->stone_id     = [];
        $this->unit         = [];

        // dd($detail);
        foreach ($detail as $key => $value) {
            $this->materialEdit[]   = [
                'id'        => $value['id'],
                'qty'       => $value['qty'],
                'stone_id'  => $value['stone_id'],
                'unit'      => $value['unit'],
                'status'    => 'old'
            ];

            $this->unit[]   = $value['unit'];
            $this->stone_id[]   = $value['stone_id'];
        }

        // dd($this->material);
    }
}
