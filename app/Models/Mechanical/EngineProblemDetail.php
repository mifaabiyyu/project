<?php

namespace App\Models\Mechanical;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineProblemDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }

    public function get_engine_problem()
    {
        return $this->belongsTo(EngineProblem::class, 'engine_problem_id', 'id');
    }
}
