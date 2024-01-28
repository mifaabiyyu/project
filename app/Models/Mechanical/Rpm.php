<?php

namespace App\Models\Mechanical;

use App\Models\Production\ProductionPlanning;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rpm extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'rpms', 'field' => 'code', 'length' => 12, 'prefix' => 'RPM' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_detail()
    {
        return $this->hasMany(RpmDetail::class, 'rpm_id', 'id');
    }

    public function get_production_planning()
    {
        return $this->belongsTo(ProductionPlanning::class, 'production_planning_id', 'id');
    }
}
