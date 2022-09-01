<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected function Ranking_Detail()
    {
        return $this->hasMany(Ranking_Detail::class);
    }
}
