<?php

namespace App\Http\Livewire\Components\Modal\StoneSupplierLab;

use App\Models\RawMaterial\Stone;
use App\Models\RawMaterial\StoneSupplierLab;
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

    public function mount()
    {
        $this->stones = Stone::all();
    }

    public function render()
    {
        return view('livewire.components.modal.stone-supplier-lab.edit');
    }

    
    public function setValueData($detail)
    {
        // dd($detail);
        $this->materialEdit = [];
        $this->deleted      = [];
        $this->stone_id     = [];

        foreach ($detail as $key => $value) {
            $getDetail      = StoneSupplierLab::where('stone_supplier_detail_id', $value['id'])->first();
            if ($getDetail) {
                $this->materialEdit[]   = [
                    'id'        => $getDetail->id,
                    'stone_id'  => $value['stone_id'],
                    'caco3'     => $getDetail->caco3,
                    'mgco3'     => $getDetail->mgco3,
                    'cie_85'    => $getDetail->cie_85,
                    'iso_2470'  => $getDetail->iso_2470,
                    'moisture'  => $getDetail->moisture,
                    'description'   => $getDetail->description,
                ];
    
                $this->stone_id[]   = $value['stone_id'];
            }
        }

        // dd($this->material);
    }
}
