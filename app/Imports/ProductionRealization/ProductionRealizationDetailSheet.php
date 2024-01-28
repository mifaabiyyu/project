<?php

namespace App\Imports\ProductionRealization;

use App\Models\MasterData\Product;
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

class ProductionRealizationDetailSheet implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $findDetail = ProductionRealizationDetail::where('code', $row['nomor_laporan_produksi_detail'])->first();

        $findData   = ProductionRealization::where('code', $row['nomor_laporan_produksi'])->first();

        if ($findData && !$findDetail) {
            $findProduct    = Product::where('product_type', $row['jenis_produk'])->first();
            $countWeight    = $findData->total_weight + $row['jumlah_tonase'];
            $countQty       = $findData->total_qty + $row['jumlah_sak'];

            $idDetailPlan   = null;

            if ($findData->production_planning_id) {
                $findPlanDetail = ProductionPlanningDetail::where('production_planning_id', $findData->production_planning_id)
                ->where('product_id', $findProduct->id)->where('machine_id', $row['mesin'])->first();

                if ($findPlanDetail) {
                    $idDetailPlan   = $findPlanDetail->id;
                }
            }

            ProductionRealizationDetail::create([
                    'code'                      => $row['nomor_laporan_produksi_detail'],
                    'production_planning_detail_id' => $idDetailPlan,
                    'production_realization_id'    => $findData->id,
                    'product_id'                => $findProduct->id,
                    'weight'                    => $row['jumlah_tonase'],
                    'qty'                       => $row['jumlah_sak'],
                    'machine_id'                => $row['mesin'],
                    'rpm'                       => 0,
                    'ssa'                       => 0,
                    'd_50'                      => 0,
                    'd_98'                      => 0,
                    'cie_86'                    => 0,
                    'iso_2470'                  => 0,
                    'moisture'                  => 0,
                    'residue'                   => 0,
                    'created_at'                => $findData->created_at
            ]);

            $findData->update([
                'total_weight'      => $countWeight,
                'total_qty'         => $countQty,
            ]);

            $codeTransaction = IdGenerator::generate([
                'table' => (new ProductTransaction())->getTable(),
                'field' => 'code',
                'length' => 16,
                'prefix' => 'TRS' . '-'. date('y') . '-' . date('m') . '-',
                'reset_on_prefix_change' => true
            ]);

            $stockAfter     = $findProduct->stock + $row['jumlah_sak'];

            ProductTransaction::create([
                'code'              => $codeTransaction,
                'reference'         => $row['nomor_laporan_produksi_detail'],
                'product_id'        => $findProduct->id,
                'stock_before'      => $findProduct->stock,
                'stock_after'       => $stockAfter,
                'qty'               => $row['jumlah_sak'],
                'type_transaction'  => 'Incoming Transaction',
                'created_at'        => $findData->created_at
            ]);
        

            $findProduct->update([
                'stock'     => $stockAfter
            ]);

           
        }
    }
}
