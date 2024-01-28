<?php

namespace App\Imports\ProductionPlanning;

use App\Models\Production\ProductionPlanning as ProductionProductionPlanning;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductionPlanning implements ToModel, WithStartRow, WithHeadingRow
{
    
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $UNIX_DATE = ($row['tanggal_rencana'] - 25569) * 86400;
        
        $date        = gmdate("Y-m-d", $UNIX_DATE);
        $findProductionPlanning = ProductionProductionPlanning::where('code', $row['nomor_rencana_produksi'])->first();

        if (!$findProductionPlanning) {
            ProductionProductionPlanning::create([
                'code'              => $row['nomor_rencana_produksi'],
                'planning_date'     => $date,
                'description'       => $row['keterangan'] == "NULL" ? '-' : $row['keterangan'] ,
                'total_weight'      => 0,
                'total_qty'         => 0,
                'created_by'        => auth()->user()->id,
                'status'            => 3,
                'created_at'        => $date
            ]);
        }
    }
}
