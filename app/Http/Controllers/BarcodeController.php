<?php

namespace App\Http\Controllers;

use App\Models\Lab\LabReport;
use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionPlanningDetail;
use App\Models\Production\ProductionRealization;
use App\Models\Production\ProductionRealizationDetail;
use App\Models\RawMaterial\StoneUsage;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function work_order($code)
    {
        $code       = base64_decode($code);
        $getData    = ProductionPlanning::with('get_detail', 'get_status')->where('code', $code)->first();

        if (!$getData) {
            abort(404);
        }

        $getDetail          = ProductionPlanningDetail::where('production_planning_id', $getData->id)->get();
        $getRealization     = ProductionRealization::where('production_planning_id', $getData->id)->first();

        $getRealizationDetail = '';

        if ($getRealization) {
            $getRealizationDetail = ProductionRealizationDetail::where('production_realization_id', $getRealization->id)->get();
        }

        $getLabReport       = LabReport::with('get_detail')->where('production_planning_id', $getData->id)->first();

        $rawMaterial        = StoneUsage::with('get_detail')->where('production_planning_id', $getData->id)->first();
        
        $data   = [
            'data'                  => $getData,
            'detail'                => $getDetail,
            'getRealization'        => $getRealization,
            'getRealizationDetail'  => $getRealizationDetail,
            'getLabReport'          => $getLabReport,
            'rawMaterial'           => $rawMaterial
        ];

        return view('barcode.production_planning', $data);
    }
}
