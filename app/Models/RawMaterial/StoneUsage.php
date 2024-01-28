<?php

namespace App\Models\RawMaterial;

use App\Models\Production\ProductionPlanning;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneUsage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'stone_usages', 'field' => 'code', 'length' => 15, 'prefix' => 'SUSG' . '-'. date('y') . '-' . date('m') . '-'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }

    public function get_production()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }

    public function get_detail()
    {
        return $this->hasMany(StoneUsageDetail::class, 'stone_usage_id', 'id');
    }
}
