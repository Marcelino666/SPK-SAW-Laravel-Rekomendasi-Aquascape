<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking_Detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ranking_details';
    protected $guarded = [];

    public function ranking()
    {
        return $this->belongsTo(Ranking::class, 'rank_id');
    }
}
