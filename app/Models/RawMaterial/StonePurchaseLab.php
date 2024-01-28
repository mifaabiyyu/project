<?php

namespace App\Models\RawMaterial;

use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StonePurchaseLab extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'stone_purchase_labs', 'field' => 'code', 'length' => 14, 'prefix' => 'SPL' . '-' . date('y') . '-' . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_purchase()
    {
        return $this->belongsTo(StonePurchase::class, 'stone_purchase_id', 'id');
    }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }
}
