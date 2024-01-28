<?php

namespace App\Models\RawMaterial;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StonePurchase extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'stone_purchases', 'field' => 'code', 'length' => 14, 'prefix' => 'SPU' . '-' . date('y') . '-' . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_supplier()
    {
        return $this->belongsTo(StoneSupplier::class, 'supplier_id', 'id');
    }

    public function get_stone()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }

}
