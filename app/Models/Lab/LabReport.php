<?php

namespace App\Models\Lab;

use App\Models\Production\ProductionPlanning;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_detail()
    {
        return $this->hasMany(LabReportDetail::class, 'lab_report_id', 'id')->orderBy('time', 'asc');
    }

    public function get_production_planning()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }
}
