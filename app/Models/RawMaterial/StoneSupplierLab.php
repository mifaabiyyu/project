<?php

namespace App\Models\RawMaterial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneSupplierLab extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_stone_detail()
    {
        return $this->belongsTo(StoneSupplierDetail::class, 'stone_supplier_detail_id', 'id');
    }
}
