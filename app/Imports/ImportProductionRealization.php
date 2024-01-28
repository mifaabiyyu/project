<?php

namespace App\Imports;

use App\Imports\ProductionRealization\ProductionRealizationDetailSheet;
use App\Imports\ProductionRealization\ProductionRealizationSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ImportProductionRealization implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            0 => new ProductionRealizationSheet(),
            1 => new ProductionRealizationDetailSheet(),
        ];
    }
}
