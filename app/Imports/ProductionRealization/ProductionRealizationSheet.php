<?php

namespace App\Imports\ProductionRealization;

use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionRealization;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductionRealizationSheet implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $UNIX_DATE = ($row['tanggal_laporan_produksi'] - 25569) * 86400;
        
        $date        = gmdate("Y-m-d", $UNIX_DATE);
        $findProductionRealization = ProductionRealization::where('code', $row['nomor_laporan_produksi'])->first();

        $UNIX_DATE = ($row['tanggal_input'] - 25569) * 86400;
        $inputDate        = gmdate("Y-m-d", $UNIX_DATE);
        $codePlanning   = null;
        if (!$findProductionRealization) {
            if ($row['referensi'] != "NULL") {
                $findPlanning   = ProductionPlanning::where('code', $row['referensi'])->first();
                if ($findPlanning) {
                    $codePlanning   = $findPlanning->id;
                    
                    $findPlanning->update([
                        'status'    => 13
                    ]);
                }
            }

            ProductionRealization::create([
                'code'                  => $row['nomor_laporan_produksi'],
                'production_planning_id'=> $codePlanning,
                'real_date'             => $date,
                'description'           => '-' ,
                'total_weight'          => 0,
                'total_qty'             => 0,
                'created_by'            => auth()->user()->id,
                'status'                => 13,
                'created_at'            => $inputDate,
            ]);
            
        }
    }
}
