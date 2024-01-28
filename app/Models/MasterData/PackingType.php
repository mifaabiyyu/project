<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingType extends Model
{
    use HasFactory;
    protected $table = 'packing_types';
    protected $guarded = ['id'];
}
