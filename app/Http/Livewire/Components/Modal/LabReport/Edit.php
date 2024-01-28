<?php

namespace App\Http\Livewire\Components\Modal\LabReport;

use App\Models\Lab\LabReport;
use App\Models\MasterData\Product;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail;
use Livewire\Component;

class Edit extends Component
{
    public $productions;
    public $referencesEdit  = [];
    public $resultLabEdit   = [];
    public $deleted         = [];

    protected $listeners = [
        'selectReferenceEdit', 'setData'
    ];

    public function render()
    {
        return view('livewire.components.modal.lab-report.edit');
    }

    public function selectReferenceEdit($value)
    {
        $this->referencesEdit   = [];
        $this->resultLabEdit   = [];
        $productionPlanning = ProductionPlanning::with('get_detail_all')->find($value);

        if ($productionPlanning) {
            foreach ($productionPlanning->get_detail_all as $detail) {
                $this->referencesEdit[]   = [
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

                $this->resultLabEdit[]   = [
                    'detail_id'     => 0,
                    'mesh'  => $detail->get_product->mesh,
                    'machine'       => $detail->get_machine->name,
                    'ssa'           => $detail->ssa,
                    'd_50'          => $detail->d_50,
                    'd_98'          => $detail->d_98,
                    'cie_86'        => $detail->cie_86,
                    'iso_2470'      => $detail->iso_2470,
                    'moisture'      => $detail->moisture,
                    'residue'       => $detail->residue,
                    'time'          => '',
                    'production_planning_detail'    => $detail->id,
                    'product_id'    => $detail->product_id
                ];
            }
        }
   
    }

    public function setData($value)
    {
        $this->referencesEdit   = [];
        $this->resultLabEdit   = [];
        $findReport         = LabReport::find($value[0]['lab_report_id']);
        $productionPlanning = ProductionPlanning::with('get_detail_all')->find($findReport->production_planning_id);
        // dd($value);
        foreach ($value as $key => $val) {
            $findProduct    = ProductionPlanningDetail::with('get_product', 'get_machine')->find($val['production_planning_detail_id']);

            $this->resultLabEdit[$findProduct->get_machine->name][$key]   = [
                'detail_id'     => $val['id'],
                'mesh'          => $findProduct->get_product->mesh,
                'machine'       => $findProduct->get_machine->name,
                'ssa'           => $val['ssa'],
                'd_50'          => $val['d_50'],
                'd_98'          => $val['d_98'],
                'cie_86'        => $val['cie_86'],
                'iso_2470'      => $val['iso_2470'],
                'moisture'      => $val['moisture'],
                'residue'       => $val['residue'],
                'time'          => $val['time'],
                'product_id'    => $val['product_id'],
                'production_planning_detail'    => $val['production_planning_detail_id'],
            ];
        }

    }

        
    public function deleteRow($index, $machine)
    {
        // dd($machine);
        if ($this->resultLabEdit[$machine][$index]['detail_id'] != 0) {
            $this->deleted[]    = $this->resultLabEdit[$machine][$index]['detail_id'];
        }

        unset($this->resultLabEdit[$machine][$index]);
        array_values($this->resultLabEdit);
    }
}
