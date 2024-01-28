<?php

namespace App\Models\RawMaterial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneSupplierDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_lab()
    {
        return $this->belongsTo(StoneSupplierLab::class, 'stone_supplier_detail_id', 'id');
    }

    public function get_supplier()
    {
        return $this->belongsTo(StoneSupplier::class, 'stone_supplier_id', 'id');
    }

    public function get_stone()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }
}
