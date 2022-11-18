<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'resep_id',
        'bahan_resep',
    ];
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','resep_id','id');
    }
}
