<?php

namespace App\Imports;

use App\Imports\ProductionPlanning\ProductionPlanning;
use App\Imports\ProductionPlanning\ProductionPlanningDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProductionPlanning implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function sheets(): array
    {
        return [
            0 => new ProductionPlanning(),
            1 => new ProductionPlanningDetail(),
        ];
    }
}
