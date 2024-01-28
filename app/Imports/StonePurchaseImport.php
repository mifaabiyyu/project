<?php

namespace App\Imports;

use App\Models\RawMaterial\MapingStockStone;
use App\Models\RawMaterial\Stone;
use App\Models\RawMaterial\StonePurchase;
use App\Models\RawMaterial\StonePurchaseLab;
use App\Models\RawMaterial\StoneSupplier;
use App\Models\RawMaterial\StoneTransaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StonePurchaseImport implements ToModel, WithStartRow, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
    //    dd($row);
      
       $UNIX_DATE = ($row['date'] - 25569) * 86400;
        
       $date        = gmdate("Y-m-d", $UNIX_DATE);
        // dd($date);
        $checkData  = StonePurchase::where('date', $date)->where('nopol_kendaraan', $row['nopol_kendaraan'])->first(); 

        if (!$checkData) {
            $getLastData    = StonePurchase::where('status_data', 0)->first();
     
            if ($getLastData) {
                $getLastData->update([
                    'status_data'    => 1
                ]);
            }
     
            $findStone       = Stone::where('name', $row['material'])->first();
            $findSupplier    = StoneSupplier::where('name', $row['supplier'])->first();
            $potongan        = $row['berat_kg'] * $row['pot'];
            $weightFix       = $row['berat_kg'] - $potongan;
     
            $dateMY          = date('M-Y', strtotime($date));
     
            $create     = StonePurchase::create([
                'date'              => $date,
                'supplier_id'       => $findSupplier->id,
                'stone_id'          => $findStone->id,
                'driver'            => $row['sopir'],
                'nopol_kendaraan'   => $row['nopol_kendaraan'],
                'netto'             => $row['berat_kg'],
                'weight_fix'        => $weightFix ,
                'potongan'          => $row['pot'] * 100,
                'quality'           => $row['quality'],
                'location'          => 'Unit ' .$row['unit_bongkar'],
                'description'       => $row['note'],
                'status'            => 7,
                'created_by'        => auth()->user()->id,
             //    'delivery_order_number'   => $row['delivery_order_number'],
            ]);
     
            $checkMaping    = MapingStockStone::where('stone_id', $findStone->id)->where('date', $dateMY)->first();
     
     
            if ($checkMaping) {
                $checkMaping->update([
                    'stock_end'     => $checkMaping->stock_end + (int)$weightFix 
                ]);
            } else {
                $prevmonth = date('M-Y', strtotime("last month"));
     
                $checkLastMonth = MapingStockStone::where('stone_id', $findStone->id)->where('date', $prevmonth)->first();
     
                $stockStart = 0;
     
                if ($checkLastMonth) {
                    $stockStart  = $checkLastMonth->stock_end;
                }
     
                MapingStockStone::create([
                    'stone_id'      => $findStone->id,
                    'date'          => $dateMY,
                    'stock_start'   => $stockStart,
                    'stock_end'     => $stockStart + (int)$weightFix ,
                ]);
            }
     
            $updateStock    = Stone::find($findStone->id);
            $stockBefore    = $updateStock->stock;
     
            if ($updateStock) {
                $updateStock->update([
                    'stock'     => $updateStock->stock + (int)$weightFix 
                ]);
            }
     
            StoneTransaction::create([
                'stone_id'          => $findStone->id,
                'stock_before'      => $stockBefore,
                'stock_after'       => $stockBefore + (int)$weightFix ,
                'qty'               => $weightFix ,
                'type_transaction'  => 'Incoming Transaction',
                'reference'         => $create->code,
                'date'              => $date
            ]);
     
            StonePurchaseLab::create([
                'stone_purchase_id'     => $create->id
            ]);
        }
    }
}
