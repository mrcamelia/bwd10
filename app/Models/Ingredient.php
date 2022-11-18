<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'recipe_id',
        'list_ingredient',
    ];
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','recipe_id','id');
    }
}
