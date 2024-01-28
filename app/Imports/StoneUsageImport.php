<?php

namespace App\Imports;

use App\Models\RawMaterial\MapingStockStone;
use App\Models\RawMaterial\Stone;
use App\Models\RawMaterial\StoneTransaction;
use App\Models\RawMaterial\StoneUsage;
use App\Models\RawMaterial\StoneUsageDetail;
use DateTime;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class StoneUsageImport implements ToModel, WithStartRow, WithCalculatedFormulas
{

    /**
    * @param Collection $collection
    */

    public function startRow(): int
    {
        return 4;
    }

    public function model(array $row)
    {

        $UNIX_DATE = ($row[0] - 25569) * 86400;
        
        $date        = gmdate("Y-m-d", $UNIX_DATE);

        $checkData  = StoneUsage::where('date', $date)->first();

        if (!$checkData) {
            if ($row[3] != 0) {
                $getLastData    = StoneUsage::where('status', 0)->first();
        
                if ($getLastData) {
                    $getLastData->update([
                        'status'    => 1
                    ]);
                }
                
                $date = new DateTime($date);

                $code = IdGenerator::generate([
                    'table' => (new StoneUsage())->getTable(),
                    'field' => 'code',
                    'length' => 15,
                    'prefix' => 'SUSG' . '-'. date_format($date, "y") . '-' . date_format($date, "m") . '-',
                    'reset_on_prefix_change' => true
                ]);
        
                $create     = StoneUsage::create([
                    'code'                      => $code,
                    'date'                      => $date,
                    'production_planning_id'    => null,
                    'total_qty'                 => $row[3] == 0 ? $row[1] + $row[2] : $row[3],
                    'created_by'                => auth()->user()->id,
                    'total_unit1'               => $row[1],
                    'total_unit2'               => $row[2],
                    'created_at'                => $date
                ]);
                
                if ($row[4] != '-') {
                    $this->storeDetail($create, $row[4], 'BATU KETAK', 'unit 1', $date);
                }
                
                if ($row[5] != '-') {
                    $this->storeDetail($create, $row[5], 'BATU KETAK', 'unit 2', $date);
                }
                
                if ($row[8] != '-') {
                    $this->storeDetail($create, $row[8], 'BATU KAPUR', 'unit 1', $date);
                }
                
                if ($row[9] != '-') {
                    $this->storeDetail($create, $row[9], 'BATU KAPUR', 'unit 2', $date);
                }
                
                if ($row[12] != '-') {
                    $this->storeDetail($create, $row[12], 'BATU DOLOMITE', 'unit 1', $date);
                }
                
                if ($row[13] != '-') {
                    $this->storeDetail($create, $row[13], 'BATU DOLOMITE', 'unit 2', $date);
                }
            }
            
        }

        
    }

    public function storeDetail($create, $qty, $stone, $unit, $date)
    {
        $code = IdGenerator::generate([
            'table' => (new StoneUsageDetail())->getTable(),
            'field' => 'code',
            'length' => 16,
            'prefix' => 'SUSGD' . '-'. date_format($date, "y") . '-' . date_format($date, "m") . '-',
            'reset_on_prefix_change' => true
        ]);

        $getStone  = Stone::where('name', $stone)->first();

        $createDetail   = StoneUsageDetail::create([
            'code'              => $code,
            'stone_usage_id'    => $create->id,
            'stone_id'          => $getStone->id,
            'qty'               => $qty,
            'unit'              => $unit,
            'created_at'        => $date
        ]);

        StoneTransaction::create([
            'stone_id'          => $getStone->id,
            'stock_before'      => $getStone->stock,
            'stock_after'       => $getStone->stock - $qty,
            'qty'               => $qty,
            'type_transaction'  => 'Outgoing Transaction',
            'reference'         => $createDetail->code,
            'date'              => $date,
            'created_at'        => $date
        ]);


        $checkMaping    = MapingStockStone::where('stone_id', $getStone->id)->where('date', date_format($date, "M-Y"))->first();

        if ($checkMaping) {
            $checkMaping->update([
                'stock_end'     => $checkMaping->stock_end - $qty
            ]);
        } else {
            $prevmonth = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $date ) ));
            
            $checkLastMonth = MapingStockStone::where('stone_id', $getStone->id)->where('date', $prevmonth)->first();

            $stockStart = 0;

            if ($checkLastMonth) {
                $stockStart  = $checkLastMonth->stock_end;
            }

            MapingStockStone::create([
                'stone_id'      => $getStone->id,
                'date'          => date_format($date, "M-Y"),
                'stock_start'   => $stockStart,
                'stock_end'     => $stockStart - $qty,
                'created_at'    => $date
            ]);
        }

        if ($getStone) {
            $getStone->update([
                'stock'     => $getStone->stock - $qty
            ]);
        }
    }
}
