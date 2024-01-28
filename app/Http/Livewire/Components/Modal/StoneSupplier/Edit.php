<?php

namespace App\Http\Livewire\Components\Modal\StoneSupplier;

use App\Models\RawMaterial\Stone;
use Livewire\Component;

class Edit extends Component
{
    public $stones = [];
    public $materialEdit = [];
    public $datas   = [];
    public $deleted = [];
    public $stone_id   = [];

    protected $listeners = [
        'setValueData', 'changeStone'
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->stones = Stone::all();
    }

    public function render()
    {
        return view('livewire.components.modal.stone-supplier.edit');
    }

    public function addProduct()
    {
        $this->materialEdit[]   = [
            'id'        => 0,
            'stone_id'  => '',
            'status'    => 'new'
        ];

        $this->stone_id[]   = '';
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

        foreach ($detail as $key => $value) {
            $this->materialEdit[]   = [
                'id'        => $value['id'],
                'stone_id'  => $value['stone_id'],
                'status'    => 'old'
            ];

            $this->stone_id[]   = $value['stone_id'];
        }

        // dd($this->material);
    }
    
}
