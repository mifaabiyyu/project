<?php

namespace App\Models\Production;

use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionRealization extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'production_realizations', 'field' => 'code', 'length' => 12, 'prefix' => 'WOR' . date('y') . date('m') . '-'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_detail()
    {
        return $this->hasMany(ProductionRealizationDetail::class, 'production_realization_id', 'id');
    }

    public function get_planning()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }
}
