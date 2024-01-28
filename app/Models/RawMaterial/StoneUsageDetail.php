<?php

namespace App\Models\RawMaterial;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneUsageDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_stone()
    {
        return $this->belongsTo(Stone::class, 'stone_id', 'id');
    }
}
