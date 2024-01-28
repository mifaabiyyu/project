<?php

namespace App\Imports\ProductionPlanning;

use App\Models\MasterData\Product;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail as ProductionProductionPlanningDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductionPlanningDetail implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $findDetail = ProductionProductionPlanningDetail::where('code', $row['nomor_rencana_produksi_detail'])->first();

        $findData   = ProductionPlanning::where('code', $row['nomor_rencana_produksi'])->first();

        if ($findData && !$findDetail) {
            $findProduct    = Product::where('product_type', $row['jenis_produk'])->first();
            $countWeight    = $findData->total_weight + $row['jumlah_tonase'];
            $countQty       = $findData->total_qty + $row['jumlah_sak'];

            ProductionProductionPlanningDetail::create([
                    'code'                      => $row['nomor_rencana_produksi_detail'],
                    'production_planning_id'    => $findData->id,
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
                    'created_at'                => $findData->planning_date
            ]);

            $findData->update([
                'total_weight'      => $countWeight,
                'total_qty'         => $countQty,
            ]);
        }
    }
}
