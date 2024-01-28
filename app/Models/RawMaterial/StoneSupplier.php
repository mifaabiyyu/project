<?php

namespace App\Models\RawMaterial;

use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneSupplier extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'stone_suppliers', 'field' => 'code', 'length' => 7, 'prefix' => 'SS' . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_detail()
    {
        return $this->hasMany(StoneSupplierDetail::class, 'stone_supplier_id', 'id');
    }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }
    
}
