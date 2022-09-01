<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeFilter($query, $search) {
        if(isset($search) ? $search : false) {
            return $query->where('name', 'like', '%' .$search. '%');
        }
    }

    // protected function plant_photo()
    // {
    //     return $this->hasMany(PlantPhoto::class);
    // }
}
