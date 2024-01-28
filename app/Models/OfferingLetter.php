<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferingLetter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
         
    //         $args = 
    //         [
    //             'table' => 'offering_letters', 
    //             'field' => 'code', 
    //             'length' => 15, 
    //             'prefix' => date('Y') . '/' . 'SM'. '/' . 'SP2' . '/'
    //         ];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }


    public function offering_detail()
    {
        return $this->hasMany(OfferingLetterDetail::class, 'offering_letter_id', 'id');
    }
}
