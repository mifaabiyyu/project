<?php

namespace App\Models\RawMaterial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_stone()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }
}
