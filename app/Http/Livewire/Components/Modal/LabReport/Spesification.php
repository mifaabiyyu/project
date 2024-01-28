<?php

namespace App\Http\Livewire\Components\Modal\LabReport;

use App\Models\Lab\LabReport;
use App\Models\Machine;
use App\Models\MasterData\Product;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail;
use Livewire\Component;

class Spesification extends Component
{
    public $productions;
    public $referencesSpec  = [];
    public $resultLabSpec   = [];

    protected $listeners = [
        'setDataSpec'
    ];

    public function render()
    {
        return view('livewire.components.modal.lab-report.spesification');
    }

    public function setDataSpec($value)
    {
        $this->referencesSpec   = [];

        $findReport         = LabReport::find($value[0]['lab_report_id']);
        $productionPlanning = ProductionPlanning::with('get_detail_all')->find($findReport->production_planning_id);
        // dd($value);
        if ($productionPlanning) {
            foreach ($productionPlanning->get_detail_all as $detail) {
                $this->referencesSpec[]   = [
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
            }
        }

        foreach ($value as $key => $val) {
            $findProduct    = Product::find($val['product_id']);
            $findMachine    = Machine::find($val['machine_id']);

            $this->resultLabSpec[$findMachine->name][$key]   = [
                'detail_id'     => $val['id'],
                'mesh'          => $findProduct->mesh,
                'machine'       => $findMachine->name,
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
}
