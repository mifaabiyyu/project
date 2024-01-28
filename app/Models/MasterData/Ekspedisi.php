<?php

namespace App\Models\MasterData;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'ekspedisis', 'field' => 'code', 'length' => 7, 'prefix' => 'EKSP'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }
}
