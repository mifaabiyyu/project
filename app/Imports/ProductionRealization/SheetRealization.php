<?php

namespace App\Imports\ProductionRealization;

use App\Models\Machine;
use App\Models\MasterData\Product;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail;
use App\Models\Production\ProductionRealization;
use App\Models\Production\ProductionRealizationDetail;
use App\Models\Production\ProductTransaction;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SheetRealization implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collections)
    {
        $date = '';
        foreach ($collections as $key => $collection) {
            if (!is_string($collection[0])) {
                $date = ($collection[0] - 25569) * 86400;
                $date = gmdate("Y-m-d", $date);
            }
         
            foreach ($collections[0] as $keys => $value) {
                if ($value != null && $collection[$keys] != null) {
                    $product_type   = str_replace(' ', '', $value);
        
                    $findProduct    = Product::where('product_type', $product_type)->first();
                    
                    if ($findProduct && !is_string($collection[$keys]) ) {
                        if ($date != null) {
                            $findPlanning       = ProductionPlanning::where('planning_date', $date)->first();
                            $findRealization    = ProductionRealization::where('real_date', $date)->first();
                            if ($findPlanning && $findPlanning->status != 13) {
                                if (!$findRealization) {
                                    $createRealization  = ProductionRealization::create([
                                        'real_date'                 => $date,
                                        'production_planning_id'    => $findPlanning->id,
                                        'description'               => '-',
                                        'total_weight'              => $collection[$keys] * $findProduct->weight,
                                        'total_qty'                 => $collection[$keys],
                                        'created_by'                => auth()->user()->id,
                                        'status'                    => 13
                                    ]);
    
                                    $code = IdGenerator::generate([
                                        'table' => (new ProductionRealizationDetail())->getTable(),
                                        'field' => 'code',
                                        'length' => 13,
                                        'prefix' => 'WORD' . '-'. date('y') . '-' . date('m') . '-',
                                        'reset_on_prefix_change' => true
                                    ]);
                    
                                    $findMachine            = Machine::whereRaw('LOWER(`name`) =? ',[trim(strtolower($collection[1]))])->first();
                                    $idPlanningDetail       = 0;
                                    $findPlanningDetail     = ProductionPlanningDetail::where('production_planning_id', $findPlanning->id)->where('product_id', $findProduct->id)->where('machine_id', $findMachine->id)->first();
    
                                    if ($findPlanningDetail) {
                                        $idPlanningDetail   = $findPlanningDetail->id;
                                    }
    
                                    
    
                                    ProductionRealizationDetail::create([
                                        'code'                          => $code,
                                        'production_realization_id'     => $createRealization->id,
                                        'production_planning_detail_id' => $idPlanningDetail,
                                        'product_id'                    => $findProduct->id,
                                        'weight'                        => $collection[$keys] * $findProduct->weight,
                                        'qty'                           => $collection[$keys],
                                        'machine_id'                    => $findMachine->id,
                                    ]);
                                } else  if ($findRealization) {
                                    $countQty       = $findRealization->total_qty + $collection[$keys];
                                    $countWeight    = $findRealization->total_weight + ($collection[$keys] * $findProduct->weight);
    
                                    $findRealization->update([
                                        'total_weight'              => $countWeight,
                                        'total_qty'                 => $countQty,
                                    ]);
    
                                    $code = IdGenerator::generate([
                                        'table' => (new ProductionRealizationDetail())->getTable(),
                                        'field' => 'code',
                                        'length' => 13,
                                        'prefix' => 'WORD' . '-'. date('y') . '-' . date('m') . '-',
                                        'reset_on_prefix_change' => true
                                    ]);
    
                                    $findMachine            = Machine::whereRaw('LOWER(`name`) =? ',[trim(strtolower($collection[1]))])->first();
                                    $idPlanningDetail       = 0;
                                    $findPlanningDetail     = ProductionPlanningDetail::where('production_planning_id', $findPlanning->id)->where('product_id', $findProduct->id)->where('machine_id', $findMachine->id)->first();
    
                                    if ($findPlanningDetail) {
                                        $idPlanningDetail   = $findPlanningDetail->id;
                                    }
    
                                    
    
                                    ProductionRealizationDetail::create([
                                        'code'                          => $code,
                                        'production_realization_id'     => $findRealization->id,
                                        'production_planning_detail_id' => $idPlanningDetail,
                                        'product_id'                    => $findProduct->id,
                                        'weight'                        => $collection[$keys] * $findProduct->weight,
                                        'qty'                           => $collection[$keys],
                                        'machine_id'                    => $findMachine->id,
                                    ]);
                                }
    
                                $codeTransaction = IdGenerator::generate([
                                    'table' => (new ProductTransaction())->getTable(),
                                    'field' => 'code',
                                    'length' => 16,
                                    'prefix' => 'TRS' . '-'. date('y') . '-' . date('m') . '-',
                                    'reset_on_prefix_change' => true
                                ]);
                
                                $stockAfter     = $findProduct->stock + $collection[$keys];
                
                                ProductTransaction::create([
                                    'code'              => $codeTransaction,
                                    'reference'         => $code,
                                    'product_id'        => $findProduct->id,
                                    'stock_before'      => $findProduct->stock,
                                    'stock_after'       => $stockAfter,
                                    'qty'               => $collection[$keys],
                                    'type_transaction'  => 'Incoming Transaction'
                                ]);
                            
                
                                $findProduct->update([
                                    'stock'     => $stockAfter
                                ]);
    
                                if ($findPlanning) {
                                    $findPlanning->update([
                                        'status'    => 13
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
        
    public function startRow(): int
    {
        return 2;
    }

}
