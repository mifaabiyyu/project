<?php

namespace App\Models\Production;

use App\Models\MasterData\Product;
use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPlanning extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    
    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'production_plannings', 'field' => 'code', 'length' => 12, 'prefix' => 'WOS' . date('y') . date('m') . '-'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }

    
    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_detail()
    {
        return $this->hasMany(ProductionPlanningDetail::class, 'production_planning_id', 'id');
    }

    public function get_detail_all()
    {
        return $this->hasMany(ProductionPlanningDetail::class, 'production_planning_id', 'id')->with('get_product', 'get_machine');
    }

}
