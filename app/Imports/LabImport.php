<?php

namespace App\Imports;

use App\Models\Lab\LabReport;
use App\Models\Lab\LabReportDetail;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail;
use App\Models\Production\ProductionRealization;
use App\Models\Production\ProductionRealizationDetail;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LabImport implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $findDate = ProductionRealization::where('code', $row['nomor_laporan_produksi'])->first();
        if ($findDate) {
            
            $findProductionPlanning = ProductionPlanning::where('planning_date', $findDate->real_date)->first();
    
            $checkData  = LabReport::where('date', $findDate->real_date)->first();
            $planDetailId   = null;
    
            if ($findProductionPlanning) {
                $findPlanDetail = ProductionPlanningDetail::where('production_planning_id', $findProductionPlanning->id)->where('machine_id', $row['mesin'])->first();
    
                if ( $findPlanDetail) {
                    $planDetailId   = $findPlanDetail->id;
                }
            }else {
                $findPlanDetail = ProductionRealizationDetail::where('production_realization_id', $findDate->id)->where('machine_id', $row['mesin'])->first();
            }
    
    
            if (!$checkData) {
                $code = IdGenerator::generate([
                    'table' => (new LabReport())->getTable(),
                    'field' => 'code',
                    'length' => 14,
                    'prefix' => 'LRP' . '-'. date('y') . '-' . date('m') . '-',
                    'reset_on_prefix_change' => true
                ]);
    
                $createData = LabReport::create([
                    'production_planning_id'    => $findProductionPlanning->id ?? null,
                    'date'                      => $findDate->real_date,
                    'code'                      => $code,
                    'batch'                     => 2
                ]);
    
                $codeDetail = IdGenerator::generate([
                    'table' => (new LabReportDetail())->getTable(),
                    'field' => 'code',
                    'length' => 15,
                    'prefix' => 'LRPD' . '-'. date('y') . '-' . date('m') . '-',
                    'reset_on_prefix_change' => true
                ]);
    
              
    
    
                $createDetail       = LabReportDetail::create([
                    'lab_report_id'     => $createData->id,
                    'machine_id'        => $row['mesin'],
                    'code'              => $codeDetail,
                    'time'              => $row['jam_waktu'],
                    'ssa'               => $row['ssa'],
                    'd_50'              => $row['d50'],
                    'd_98'              => $row['d98'],
                    'cie_86'            => $row['cie86'],
                    'iso_2470'          => $row['iso2470'],
                    'moisture'          => $row['moisture'],
                    'residue'           => $row['residue'],
                    'product_id'        => $findPlanDetail->product_id ?? null,
                    'production_planning_detail_id' => $planDetailId,
                ]);
            } else {
                $findDetail = LabReportDetail::where('lab_report_id', $checkData->id)->where('machine_id', $row['mesin'])->where('time', $row['jam_waktu'])->where('ssa', $row['ssa'])->where('d_50', $row['d50'])->first();
    
                if (!$findDetail) {
                    $codeDetail = IdGenerator::generate([
                        'table' => (new LabReportDetail())->getTable(),
                        'field' => 'code',
                        'length' => 15,
                        'prefix' => 'LRPD' . '-'. date('y') . '-' . date('m') . '-',
                        'reset_on_prefix_change' => true
                    ]);
                    
                    if ($row['jam_waktu'] == "08.00.00") {
                        $row['jam_waktu'] = "08:00";
                    }
                    
                    if ($row['jam_waktu'] == "13.00.00") {
                        $row['jam_waktu'] = "13:00";
                    }
                    
                    if ($row['jam_waktu'] == "10.00.00") {
                        $row['jam_waktu'] = "10:00";
                    }
                    
                    if ($row['jam_waktu'] == "14.00.00") {
                        $row['jam_waktu'] = "14:00";
                    }
                    
                    if ($row['jam_waktu'] == "11.00.00") {
                        $row['jam_waktu'] = "11:00";
                    }
                    
                    if ($row['jam_waktu'] == "09.00.00") {
                        $row['jam_waktu'] = "09:00";
                    }
                    
                    if ($row['jam_waktu'] == "12.00.00") {
                        $row['jam_waktu'] = "12:00";
                    }

                    LabReportDetail::create([
                        'lab_report_id'     => $checkData->id,
                        'machine_id'        => $row['mesin'],
                        'code'              => $codeDetail,
                        'time'              => $row['jam_waktu'],
                        'ssa'               => $row['ssa'],
                        'd_50'              => $row['d50'],
                        'd_98'              => $row['d98'],
                        'cie_86'            => $row['cie86'],
                        'iso_2470'          => $row['iso2470'],
                        'moisture'          => $row['moisture'],
                        'residue'           => $row['residue'],
                        'product_id'        => $findPlanDetail->product_id ?? null,
                        'production_planning_detail_id' => $planDetailId,
                    ]);
                }
    
            }
        } else {
            $splitCode  = str_split($row['nomor_laporan_produksi'], 1);

            if ($splitCode[11] == 0) {
                $splitCode[10] = $splitCode[10] - 1;
                $splitCode[11] = 9;

            } else {
                $splitCode[11] = $splitCode[11] - 1;
            }
            $newCode    = $splitCode[0] . $splitCode[1] .$splitCode[2] .$splitCode[3] .$splitCode[4] .$splitCode[5] .$splitCode[6] . $splitCode[7] . $splitCode[8] . $splitCode[9] . $splitCode[10] . $splitCode[11];
            // dd($row['nomor_laporan_produksi'], $newCode);

            $findDate = ProductionRealization::where('code', $newCode)->first();

            if (!$findDate) {
                if ($splitCode[11] == 0) {
                    $splitCode[10] = $splitCode[10] - 1;
                    $splitCode[11] = 9;
    
                } else {
                    $splitCode[11] = $splitCode[11] - 1;
                }
                $newCode    = $splitCode[0] . $splitCode[1] .$splitCode[2] .$splitCode[3] .$splitCode[4] .$splitCode[5] .$splitCode[6] . $splitCode[7] . $splitCode[8] . $splitCode[9] . $splitCode[10] . $splitCode[11];
                // dd($row['nomor_laporan_produksi'], $newCode);

                $findDate = ProductionRealization::where('code', $newCode)->first();
            }

            if ($findDate) {
                
                $checkData  = LabReport::where('date', $findDate->real_date)->first();
                if ($checkData) {
                    $codeDetail = IdGenerator::generate([
                        'table' => (new LabReportDetail())->getTable(),
                        'field' => 'code',
                        'length' => 15,
                        'prefix' => 'LRPD' . '-'. date('y') . '-' . date('m') . '-',
                        'reset_on_prefix_change' => true
                    ]);
        
                    $planDetailId   = null;
                    $findProductionPlanning = ProductionPlanning::where('planning_date', $findDate->real_date)->first();
        
                    if ($findProductionPlanning) {
                        $findPlanDetail = ProductionPlanningDetail::where('production_planning_id', $findProductionPlanning->id)->where('machine_id', $row['mesin'])->first();
            
                        if ( $findPlanDetail) {
                            $planDetailId   = $findPlanDetail->id;
                        }
                    }else {
                        $findPlanDetail = ProductionRealizationDetail::where('production_realization_id', $findDate->id)->where('machine_id', $row['mesin'])->first();
                    }
            
        
                    $createDetail       = LabReportDetail::create([
                        'lab_report_id'     => $checkData->id,
                        'machine_id'        => $row['mesin'],
                        'code'              => $codeDetail,
                        'time'              => $row['jam_waktu'],
                        'ssa'               => $row['ssa'],
                        'd_50'              => $row['d50'],
                        'd_98'              => $row['d98'],
                        'cie_86'            => $row['cie86'],
                        'iso_2470'          => $row['iso2470'],
                        'moisture'          => $row['moisture'],
                        'residue'           => $row['residue'],
                        'product_id'        => $findPlanDetail->product_id ?? null,
                        'production_planning_detail_id' => $planDetailId,
                    ]);
                }
            }

        }
    }
}
