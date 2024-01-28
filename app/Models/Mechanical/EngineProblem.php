<?php

namespace App\Models\Mechanical;

use App\Models\Production\ProductionPlanning;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineProblem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'engine_problems', 'field' => 'code', 'length' => 12, 'prefix' => 'EPR' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_detail()
    {
        return $this->hasMany(EngineProblemDetail::class, 'engine_problem_id', 'id');
    }

    public function get_production_planning()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }
}
