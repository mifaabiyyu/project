<?php

namespace App\Http\Livewire\Components\Modal\LabReport;

use App\Models\Production\ProductionPlanning;
use Livewire\Component;

class Add extends Component
{
    public $productions;
    public $references  = [];
    public $resultLab  = [];

    public function hydrate()
    {
        $this->emit('select2');
    }
    
    protected $listeners = [
        'selectReference'
    ];

    public function render()
    {
        return view('livewire.components.modal.lab-report.add');
    }

    public function selectReference($value)
    {
        $this->references   = [];
        $this->resultLab    = [];
        $productionPlanning = ProductionPlanning::with('get_detail_all')->find($value);

        if ($productionPlanning) {
            foreach ($productionPlanning->get_detail_all as $detail) {
                $this->references[]   = [
                    'product_type'  => $detail->get_product->product_type,
                    'product'       => $detail->get_product->name,
                    'qty'           => $detail->qty,
                    'ssa'           => $detail->ssa,
                    'd_50'          => $detail->d_50,
                    'd_98'          => $detail->d_98,
                    'cie_86'        => $detail->cie_86,
                    'iso_2470'      => $detail->iso_2470,
                    'moisture'      => $detail->moisture,
                    'residue'       => $detail->residue,
                ];
              
                $this->resultLab[]   = [
                    'mesh'  => $detail->get_product->mesh,
                    'machine'       => $detail->get_machine->name,
                    'ssa'           => $detail->ssa,
                    'd_50'          => $detail->d_50,
                    'd_98'          => $detail->d_98,
                    'cie_86'        => $detail->cie_86,
                    'iso_2470'      => $detail->iso_2470,
                    'moisture'      => $detail->moisture,
                    'residue'       => $detail->residue,
                    'production_planning_detail'    => $detail->id,
                    'product_id'    => $detail->product_id
                ];
            }
        }
   
    }

    
    public function deleteRow($index)
    {

        unset($this->resultLab[$index]);
        array_values($this->resultLab);
    }
}
