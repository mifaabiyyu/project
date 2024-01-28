<?php

namespace App\Models\Production;

use App\Models\Machine;
use App\Models\MasterData\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionRealizationDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'production_realization_details', 'field' => 'code', 'length' => 13, 'prefix' => 'WORD' . date('y') . date('m') . '-'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }
    
    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function get_machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }
}
