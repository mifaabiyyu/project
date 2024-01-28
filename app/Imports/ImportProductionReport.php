<?php

namespace App\Imports;

use App\Imports\ProductionRealization\SheetRealization;
use App\Models\Production\ProductionPlanning;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProductionReport implements WithMultipleSheets, SkipsUnknownSheets
{
    /**
    * @param Collection $collection
    */

    public function sheets(): array
    {
        $month  = [ 
            '01' => 'Januari', 
            '02' => 'Februari', 
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $monthNow   = $month[date('m')];          
        return [
            $monthNow => new SheetRealization(),
        ];
    }
        
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
