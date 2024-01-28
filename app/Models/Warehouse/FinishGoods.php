<?php

namespace App\Models\Warehouse;

use App\Models\Production\ProductionPlanning;
use App\Models\Production\ProductionRealization;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishGoods extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'finish_goods', 'field' => 'code', 'length' => 11, 'prefix' => 'FG' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_production_planning()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }

    public function get_production_realization()
    {
        return $this->belongsTo(ProductionRealization::class, 'production_realization_id', 'id');
    }
}
