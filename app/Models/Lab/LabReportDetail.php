<?php

namespace App\Models\Lab;

use App\Models\Machine;
use App\Models\MasterData\Product;
use App\Models\Production\ProductionPlanningDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReportDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_planning_detail()
    {
        return $this->belongsTo(ProductionPlanningDetail::class, 'production_planning_detail_id', 'id');
    }

    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function get_machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }
}
