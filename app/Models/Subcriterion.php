<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcriterion extends Model
{
    use HasFactory;
    protected $hidden = [
        'id',
        'criteria_id',
    ];

    public function criterion() 
    {
        return $this->belongsTo(Criterion::class, 'criteria_id');
    }
}
